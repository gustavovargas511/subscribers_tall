<?php

namespace App\Livewire;


use App\Models\Subscriber;
use Livewire\Component;

class LandingPage extends Component
{

    public $email;

    public function subscribe(){
        //\Log::debug($this->email);
        $subscriber = Subscriber::create([
            'email' => $this.email,
        ]);
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}