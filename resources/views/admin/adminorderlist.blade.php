@extends('layout.adminproductlist')

@section('title')
Product List
@endsection

@section('content')
@include('layout.adminNavbar')

<div class="container" style="max-width: 1200px; height:580px; background-color: lightgray;">
    <h1>Order List</h1>
    <div class="container-scroll">
        <form method="post" action="{{ route('order.process') }}">
            @csrf
            @foreach($users as $user)
            <h2 style="font-text:bold;"> Orders By: {{ $user->name }}</h2>
            <div class="user-orders">
                @foreach($user->orders as $order)
                <div class="order">
                    <h3 style="color:maroon;">{{ $order->product->name }}</h3>
                    <p>Price: ₱{{ $order->product->price }}</p>
                    <p>Quantity: {{ $order->quantity }}</p>
                    <p>Total: ₱{{ $order->quantity * $order->product->price }}</p>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ready_{{ $order->id }}" name="ready_{{ $order->id }}" value="1" {{ $order->ready ? 'checked' : '' }}>
                        <label class="form-check-label" for="ready">Ready</label>
                    </div>
                </div>
                @endforeach
                <div>Total Payment: ₱{{ $user->totalPayment() }}</div><br>
            </div>
            @endforeach
        </div> <!-- Close container-scroll div -->
        
        <!-- Place the Update Order button outside container-scroll div -->
        <input type="submit" name="submit" value="Update Order" class="update-btn">
        
    </form>
</div>
@endsection