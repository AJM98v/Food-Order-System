@extends('Dashboard')

@section('content')
    <table class="w-full text-center">
        <tr class="bg-gray-600 text-white font-bold">
            <th>No.</th>
            <th>Food Name</th>
            <th>Quantity</th>
            <th>Customer</th>

        </tr>

        @foreach($orders as $order)

            <tr class="font-semibold hover:bg-gray-100 transition-all duration-300">
                <td>{{$loop->index+1}}</td>
                <td>{{\App\Models\Food::where('id','=',$order->food_id)->firstOrFail()->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{\App\Models\User::where('id','=',$order->user_id)->firstOrFail()->name}}</td>

            </tr>
        @endforeach

    </table>
@endsection
