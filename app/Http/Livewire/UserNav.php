<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserNav extends Component
{
    public $items;

    public function mount(){
        if (auth()->user()){
            \Cart::session(auth()->user()->id);
            $this->items =  \Cart::getContent();
        }

    }

    public function render()
    {
        return view('livewire.user-nav');
    }
}
