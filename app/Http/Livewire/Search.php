<?php

namespace App\Http\Livewire;

use App\Models\Food;
use DeprecationTests\Foo;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $results;


    protected $queryString = ['search'];



    public function updated(){
        $this->results=Food::where('name','like',"%".$this->search."%")->get();
    }


    public function render()
    {
        return view('livewire.search',compact($this->results));
    }
}
