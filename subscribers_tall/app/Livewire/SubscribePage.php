<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

class SubscribePage extends Component
{
    public $email;

    protected $rules = [
        'email'=>'required|email:filter|unique:subscribers,email',
    ];

    public function subscribe(){
        
        $this->validate();
        
        $subscriber = Subscriber::create([
            'email' => $this->email,
        ]);

        $this->reset('email');

    }

    public function render()
    {
        return view('livewire.subscribe-page');
    }
}
