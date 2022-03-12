@extends('Dashboard')

@section('content')
    @if(isset($food))
        <form class="p-4 grid grid-cols-2 w-10/12 gap-10 font-sans justify-items-center"
              action="{{route('food.update',$food)}}" method="post"
              enctype="multipart/form-data">
            @method('put')
            @else
                <form class="p-4 grid grid-cols-2 w-10/12 gap-10 font-sans justify-items-center"
                      action="{{route('food.store')}}" method="post"
                      enctype="multipart/form-data">
                    @endif

                    @csrf

                    <label for="name" class="font-semibold  mr-2">Name :</label>
                    <div class="flex flex-col w-full">
                        <input type="text" name="name" id="name" placeholder="Title..."
                               class="w-full outline-none border-gray-200 rounded-xl border-2 focus:outline-none focus:border-none"
                               @if(isset($food))value="{{$food->name}}"@endif>

                        @error('name')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror
                    </div>


                    <label for="Price" class="font-semibold  mr-2">Price :</label>
                    <div class="flex flex-col w-full">
                        <input type="text" name="price" id="Price" placeholder="Price $..."
                               class="w-full outline-none border-gray-200 rounded-xl border-2 focus:outline-none focus:border-none"
                               @if(isset($food))value="{{$food->price}}"@endif>
                        @error('price')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror
                    </div>


                    <label for="image" class="font-semibold  mr-2">Image :</label>
                    <div class="flex-col flex w-full">
                        <input type="file" name="image" id="image"
                               class="w-full outline-none border-gray-200  border-2 focus:outline-none focus:border-none">
                        @error('image')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror

                    </div>


                    <label for="info" class="font-semibold  mr-2">Info :</label>
                    <div class="flex flex-col w-full">
                         <textarea name="info" id="info"
                                   class="w-full h-44 outline-none border-gray-200 rounded-xl border-2 focus:outline-none focus:border-none">@if(isset($food)){{$food->info}}@endif</textarea>
                        @error('info')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror
                    </div>

                    <label for="categories" class="font-semibold  mr-2">Category :</label>
                    <div class="flex-col flex w-full">
                        <select name="categories" id="categories" multiple
                                class="w-full outline-none border-gray-200 rounded-xl border-2 focus:outline-none focus:border-none">
                            @foreach(\App\Models\Category::all() as $category)
                                <option
                                    value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror
                    </div>


                    <label for="tags" class="font-semibold  mr-2">Tags :</label>
                    <div class="flex-col flex w-full">
                        <select name="tags" id="categories" multiple
                                class="w-full outline-none border-gray-200 rounded-xl border-2 focus:outline-none focus:border-none">
                            @foreach(\App\Models\Tag::all() as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="text-red-900 font-semibold tracking-tight pt-2">{{$message}}</span>
                        @enderror
                    </div>


                    <button type="submit"
                            class="rounded shadow shadow-black py-2 w-60 bg-teal-700 text-white ml-10 hover:bg-teal-900 transition-all ease-out duration-200">
                        Create
                    </button>


                </form>
@endsection
