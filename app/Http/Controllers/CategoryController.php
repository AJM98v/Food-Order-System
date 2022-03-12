<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Categories.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name'=>'required',
            'image'=>'required'
        ]);


        Category::create([
           'name'=>$validate['name'],
           'image'=>$request->file('image')->storePublicly('public/category')
        ]);

        return redirect()->back()->with('message','Category is Created');

    }

    public function edit(Category $category){
        return view('Categories.index',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $vaildate = $request->validate([
           'name'=>'required',
            'image'=>'required'
        ]);
        $category->update([
            'name'=>$request->input('name'),
            'image'=>$request->file('image')->storePublicly('public/category')
        ]);

        return redirect()->back()->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
       return redirect()->back()->with('message','Delete is Done');
    }

    public function show(Category $category){
        $foods = $category->Foods()->get();
        return view('category',[
            'foods'=>$foods
        ]);
    }
}
