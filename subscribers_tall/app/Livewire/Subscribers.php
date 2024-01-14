<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Subscribers extends Component
{

    public $search;

    public function render()
    {
        $subscribers = Subscriber::where('email', 'like', "%{$this->search}%")->get();

        return view('livewire.subscribers')->with([
            'subscribers'=> $subscribers,
        ]);
    }

    public function delete(Subscriber $subscriber){
        //Log::info('You clicked on: ' . strval($id));
        $subscriber->delete();
    }


    
}
