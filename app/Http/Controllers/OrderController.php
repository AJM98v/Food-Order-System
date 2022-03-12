<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('Orders.index', compact('orders'));
    }

    public function show()
    {
        \Cart::session(auth()->user()->id);

        $cartItem = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('checkout', [
            'items' => $cartItem,
            'total' => $total
        ]);

    }

    public function store()
    {
        \Cart::session(auth()->user()->id);
        $items = \Cart::getContent();


        foreach ($items as $item) {
            Order::create([
                'user_id'=>auth()->user()->id,
                'food_id'=>$item->id,
                'quantity'=>$item->quantity,
                'price'=>$item->price

            ]);
        }
        \Cart::clear();

        return redirect()->route('home')->with('message','Your Order is Under Processing');
    }

    public function CustomerOrder(){
        $user = auth()->user()->id;
        $orders =Order::with(['User'])->where('user_id','=',$user)->get();

        return view('Orders.customer',compact('orders'));
    }

}
