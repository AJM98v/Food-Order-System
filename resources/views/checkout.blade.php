@extends('layouts.master')

@section('content')

    <table class="w-full text-center">
        <tr class="bg-gray-600 text-xl text-white font-bold ">
            <th>No.</th>
            <th>Food Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Operation</th>
        </tr>
        @foreach($items as $item)
            <tr class="hover:bg-gray-100 transition-all duration-200 cursor-pointer font-semibold">
                <td>{{$loop->index+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price * $item->quantity}}</td>
                <td>
                    <form action="{{route('RemoveCart',$item->id)}}" method="post">
                        @csrf @method('delete')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach


    </table>
    <div class="w-80 mt-5 flex">
        <span class="font-bold text-xl">Total :</span>
        <span class="font-bold text-xl text-red-900 ml-4">{{$total}}</span>

    </div>

    <form action="{{route('order')}}" method="post" class="w-full mt-10 text-center">
        @csrf
        <button class="rounded shadow shadow-gray-700 py-2 w-44 cursor-pointer text-center bg-teal-700 text-white">Accept & Order</button>
    </form>

@endsection
