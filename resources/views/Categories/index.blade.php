@extends('Dashboard')

@section('content')
    @if(isset($category))
        <form action="{{route('category.update',$category)}}" method="post"
              class="flex m-5 items-center justify-between" enctype="multipart/form-data">
            @method('put')
            @else
                <form action="{{route('category.store')}}" method="post" class="flex m-5 items-center justify-between"
                      enctype="multipart/form-data">
                    @endif

                    @csrf
                    <label for="name">Name :</label>
                    <div class="flex-col flex">
                        <input type="text" id="name" name="name" placeholder="Enter Title"
                               @if(isset($category))value="{{$category->name}}"@endif>
                        @error('name')
                        <span class="text-red-900 font-semibold">{{$message}}</span>
                        @enderror
                    </div>
                    <label for="icon">Icon :</label>
                    <div class="flex-col flex ">
                        <input type="file" id="icon" name="image">
                        @error('image')
                        <span class="font-semibold text-red-900">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="rounded shadow shadow-gray-700 py-2 w-32 bg-teal-900 text-white hover:bg-green-500 transition-all duration-300">@if(isset($category)) Update @else Create @endif</button>
                </form>
                <table class="w-full  mt-10 text-center">
                    <tr class="bg-gray-600 text-white">
                        <th>Name :</th>
                        <th>Operation</th>
                    </tr>
                    @foreach(\App\Models\Category::all() as $category)
                        <tr>
                            <td class="font-bold">{{$category->name}}</td>
                            <td class="flex justify-center items-center">
                                <a href="{{route('category.edit',$category)}}">
                                    <button class="btn-edit">Edit</button>
                                </a>
                                <form action="{{route('category.destroy',$category)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-delete">Delete</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
@endsection
