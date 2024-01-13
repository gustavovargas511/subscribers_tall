<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\VerifyEmail;

class SubscribePage extends Component
{
    public $email;

    public $isOpenModal = false;

    public $showSuccess = false;

    protected $rules = [
        'email'=>'required|email:filter|unique:subscribers,email',
    ];

    public function mount(Request $request){
        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function subscribe(){
        
        $this->validate();

        DB::transaction(function () {
            
            $subscriber = Subscriber::create([
                'email' => $this->email,
            ]);
    
            $notification = new VerifyEmail;

            $notification->createUrlUsing(function($notifiable){
                return URL::temporarySignedRoute(
                    'subscribers.verify',
                    now()->addMinutes(30),
                    [
                        'subscriber' => $notifiable->getKey(),
                    ],
                );
            });
    
            $subscriber->notify($notification);

        }, $deadlockRetries = 5);
        

        $this->reset('email');
        $this->isOpenModal = false;
        $this->showSuccess = true;

    }





    public function render()
    {
        return view('livewire.subscribe-page');
    }
}
