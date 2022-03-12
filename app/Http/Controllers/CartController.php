<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Food $food){


        \Cart::session(auth()->user()->id);

        \Cart::add([
            'id'=>$food->id,
            'name'=>$food->name,
            'quantity'=>'1',
            'price'=>$food->price
        ]);

        return redirect()->back()->with('message','Food in YourCart');


    }

    public function Remove(Food $food){
        \Cart::session(auth()->user()->id);
        \Cart::remove($food->id);
        return redirect()->back()->with('message','Food Remove of YourCart');
    }

    public function like(Food $food){
        $likes = $food->likes;
        $likes++;
        $food->update([
            'likes'=>$likes
        ]);
        return redirect()->back()->with('message','Thank You');

    }

}
