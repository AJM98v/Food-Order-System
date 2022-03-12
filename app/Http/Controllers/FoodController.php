<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = Food::with('User')->get();
        return view('Foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Foods.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFoodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        //
        $data = $request->validated();


        $food = Food::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'info'=>$data['info'],
            'image'=>$request->file('image')->storePublicly('public/foods'),
            'user_id'=>auth()->user()->id,

        ]);

        $food->Category()->sync($request->input('categories'));
        $food->Tag()->sync($request->input('tags'));





        return redirect()->route('food.index')->with('message','Create Seccessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
        $views = $food->views;
        $views++;
        $food->update([
           'views'=>$views
        ]);




        return view('food',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
        return view('Foods.form',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFoodRequest $request
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        //
        $validate = $request->validated();
        $food->update([
            'name'=>$validate['name'],
            'price'=>$validate['price'],
            'info'=>$validate['info'],
            'image'=>$request->file('image')->storePublicly('public/foods'),
            'user_id'=>auth()->user()->id
        ]);
        $food->Category()->sync($request->input('categories'));
        $food->Tag()->sync($request->input('tags'));

        return redirect()->route('food.index')->with('message','Update Seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
        $food->delete();
        return  redirect()->back()->with('message','Delete was Seccessfull');
    }
}
