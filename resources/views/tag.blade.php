@extends('layouts.master')

@section('content')
    <div class="grid lg:grid-cols-4 md:grid-cols-3  sm:grid-cols-2 gap-10 grid-cols-1">
        @foreach ($foods as $food)
            <div class="food-card">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($food->image) }}"
                     class="w-full h-4/6 rounded-t"
                     alt="food">
                <div class="flex flex-col p-3">
                    <h2 class="font-semibold text-gray-800">{{ $food->name }}</h2>
                    <span class="font-semibold text-opacity-90 text-gray-700">{{ $food->price }}</span>
                </div>
                <a href="{{route('AddtoCart',$food)}}">
                    <button
                        class="absolute rounded-[50%] bg-red-600 shadow shadow-gray-500  p-2 -right-2 -bottom-2.5 hover:bg-green-500 transition-all duration-200 ease-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </a>

                <a href="{{route('food',$food)}}">
                    <button
                        class="absolute rounded-[50%] bg-red-600 shadow shadow-gray-500  p-2 right-9 -bottom-2.5 hover:bg-blue-700 transition-all duration-200 ease-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </a>
                <a href="{{route('like',$food)}}">
                    <button
                        class="absolute rounded-[50%] bg-red-600 shadow shadow-gray-500  p-2 right-20 -bottom-2.5 hover:bg-rose-700 transition-all duration-200 ease-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </a>

            </div>
        @endforeach

    </div>
@endsection
