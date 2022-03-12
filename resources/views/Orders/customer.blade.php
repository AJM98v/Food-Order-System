@extends('Dashboard')

@section('content')


    <table class="w-full text-center">
        <tr class="bg-gray-600 text-white font-bold text-xl">
            <th>No</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>


        </tr>

        @foreach($orders as $order)

            <tr class="hover:bg-gray-100 transition-all duration-200 font-semibold">
                <td>{{$loop->index+1}}</td>
                <td>{{\App\Models\Food::where('id','=',$order->food_id)->firstOrFail()->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price*$order->quantity}}</td>


            </tr>
        @endforeach

    </table>
@endsection
