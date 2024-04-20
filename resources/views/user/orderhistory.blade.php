<!-- resources/views/orderhistory/index.blade.php -->

@extends('layout.userdashboard')

@section('content')
    <h1>Order History</h1>
    <ul>
        @foreach ($orderHistory as $history)
            <li>{{ $history->created_at }}: Order ID {{ $history->order_id }}</li>
        @endforeach
    </ul>
@endsection
