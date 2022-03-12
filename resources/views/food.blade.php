@extends('layouts.master')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-10 justify-items-center ">
        <img src="{{\Illuminate\Support\Facades\Storage::url($food->image)}}" alt="Photo" class="w-96 h-72 rounded-lg shadow shadow-gray-700">
        <div class="grid grid-cols-2 w-full gap-5 h-fit items-center">
            <label class="font-bold text-xl text-sky-800 ">Name:</label>
            <h2 class="font-bold text-2xl uppercase">{{$food->name}}</h2>
            <label class="font-bold text-xl text-sky-800 ">Price:</label>
            <h4 class="text-red-900 font-semibold text-lg">{{$food->price}} $</h4>
            <label class="font-bold text-xl text-sky-800 ">Chef:</label>
            <h4 class="font-bold text-2xl">{{\App\Models\User::where('id','=',$food->user_id)->first()->name}}</h4>
            <label class="font-bold text-xl text-sky-800 ">Info:</label>
            <p class="font-semibold text-lg">{{$food->info}}</p>
            <label class="font-bold text-xl text-sky-800">Categories:</label>
            <div class="flex w-full">
                @foreach($food->Category()->get() as $category)
                    <a href="{{route('category',$category)}}" class="w-fit">
                        <span class="text-gray-900 text-opacity-70 hover:text-red-800 transition-all duration-200 ease-out font-semibold">{{$category->name}}</span> ,
                    </a>

                @endforeach

            </div>
            <label class="font-bold text-xl text-sky-800">Tags:</label>
            <div class="flex w-full">
                @foreach($food->Tag()->get() as $tag)
                    <a href="{{route('tag',$tag)}}" class="w-fit">
                        <span
                            class="text-gray-900 text-opacity-70 hover:text-red-800 transition-all duration-200 ease-out font-semibold">{{$tag->name}}</span>
                        ,
                    </a>

                @endforeach

            </div>


        </div>
        <a href="{{route('AddtoCart',$food)}}"><button class="w-80 rounded shadow shadow-gray-700 py-2 bg-teal-700 hover:bg-green-700 transition-all duration-300 text-white">Add To Cart</button></a>

    </div>
@endsection
