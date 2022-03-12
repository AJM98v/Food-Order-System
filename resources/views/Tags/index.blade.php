@extends('Dashboard')

@section('content')
    @if(isset($tag))
        <form action="{{route('tag.update',$tag)}}" method="post" class="flex m-5 items-center justify-between">
            @method('put')
    @else
        <form action="{{route('tag.store')}}" method="post" class="flex m-5 items-center justify-between">
    @endif

        @csrf
        <label for="name">Name :</label>
            <div class="flex-col flex w-6/12">
                <input type="text" id="name" name="name" placeholder="Enter Title"
                       @if(isset($tag))value="{{$tag->name}}"@endif>
                @error('name')
                <span class="text-red-900 font-semibold">{{$message}}</span>
                @enderror
            </div>
        <button type="submit" class="rounded shadow shadow-gray-700 py-2 w-32 bg-teal-900 text-white hover:bg-green-500 transition-all duration-300">@if(isset($tag)) Update @else Create @endif</button>
    </form>
    <table class="w-full  mt-10 ">
        <tr class="bg-gray-600 text-white text-center">
            <th>Name :</th>
            <th>Operation</th>
        </tr>
        @foreach(\App\Models\Tag::all() as $tag)
            <tr>
                <td>{{$tag->name}}</td>
                <td class="flex justify-center items-center">
                    <a href="{{route('tag.edit', $tag)}}">
                        <button class="btn-edit">Edit</button>
                    </a>
                    <form action="{{route('tag.destroy',$tag)}}" method="post">
                        @method('delete')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
