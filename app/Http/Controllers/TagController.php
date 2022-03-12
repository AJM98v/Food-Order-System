<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //

    public function index(){
        return view('Tags.index');
    }
    public function store(Request $request){
        $validate = $request->validate([
           'name'=>'required'
        ]);


        Tag::create($validate);

        return redirect()->back()->with('message','created successfully');
    }

    public function edit(Tag $tag){
        return view('Tags.index',compact('tag'));
    }

    public function update(Request $request , Tag $tag){
        $vaidate = $request->validate([
           'name'=>'required'
        ]);
        $tag->update($vaidate);

        return redirect()->back()->with('message','Updated');


    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->back()->with('message','Delete is Done');
    }
    public function show(Tag $tag){
        $foods = $tag->Food()->get();

        return view('tag',compact('foods'));
    }
}


