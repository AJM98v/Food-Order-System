@extends('Dashboard')

@section('content')
    <table class="w-full p-2 ">
        <tr class="bg-gray-600 text-white text-lg ">
            <th>Name</th>
            <th>Price</th>
            <th>Chef</th>
            <th>Operation</th>
        </tr>

        @foreach($foods as $food)

            <tr class="hover:bg-gray-100 transition-all duration-200 text-center font-bold">
                <td>{{$food->name}}</td>
                <td>{{$food->price}}</td>
                <td>{{$food->User()->first()->toArray()['name']}}</td>
                <td class="flex justify-center items-center">
                    <a href="{{route('food.edit',$food)}}">
                        <button class="btn-edit">Edit</button>
                    </a>
                    <form action="{{route('food.destroy',$food)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>

                    <a href="{{route('food',$food)}}">
                        <button type="submit" class="transition-all duration-200 m-2 w-20 rounded shadow-gray-700 shadow py-2  bg-sky-900 text-white hover:bg-blue-600">Show</button>

                    </a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
