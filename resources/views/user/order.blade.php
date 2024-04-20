@extends('layout.cartlist')

@section('title')
    Order
@endsection

@section('content')
    <center>
        <h2><b>MY ORDER</b></h2>
    </center>
    <div class="products-container" style="max-height: 670px; margin-top:20px; overflow-y: auto;">
        @foreach($orders as $item)
            <div class="product-container">
                <div class="product-image">     
                    @if($item->product)
                        <img src="{{ asset('images/' . $item->product->image) }}" alt="Product Image" style="width: 100px; height: 100px;">
                    @endif    
                </div>
                <div class="product-details"> 
                    @if($item->product)
                        <span class="product-name" style="font-size: 20px; font-weight: none;">{{ $item->product->name }}</span><br>
                        <span class="quantity" style="font-size: 10px;">x{{ $item->quantity }}</span>
                        <span class="product-total-price" style="font-size:20px;">₱{{ $item->product->price }}</span>
                        <span class="order-date" style="font-size: 14px; color: maroon; margin-right:1px;">{{ $item->order_date }}</span><br>
                        <p style="font-size: 10px; color: {{ $item->ready ? 'green' : 'red' }};">
                            @if($item->ready)
                                <i class="fas fa-check-circle"></i> Your Order is Ready
                            @else
                                <i class="fas fa-times-circle"></i> Pending
                            @endif
                        </p>
                    @endif
                    <div style="display: flex; margin-left: 180px;">
                        <a href="myqrcode" style="margin-right: 10px;">
                            <i class="fas fa-qrcode" style="color:maroon; font-size:28px;"></i>
                        </a>
                        <form action="{{ route('order.destroy', ['order' => $item->product_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" style="border:none; border-color: white; background-color: white; border-radius: 3px; font-size: 18px;">
                                <i class="fas fa-trash-alt" style="font-size: 17px; color: maroon;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    @php
        $totalPrice = 0;
    @endphp
    @foreach($orders as $item)
    @if($item->product)
        @php
            $totalPrice += $item->product->price;
        @endphp
        @endif
    @endforeach
    <p style="background-color:maroon; width:140px; margin-left:5px; border-radius:5px; color:white; height:25px;">
        <strong>Total Price: </strong>₱{{ $totalPrice }}
    </p>

    <div class="icon-bar">
        <a class="active" href="userdashboard">
            <i class="fas fa-bars" style="font-size: 24px;"><br>
            <span style="font-size: 16px;">Home</span>
        </a></i>
        <a class="active" href="#">
            <i class="fas fa-heart"><br>
            <span style="font-size: 16px;">Favorite</span>
        </a></i>
        <a class="active" href="#">
            <i class="fas fa-clipboard-list"style="font-size: 24px;"><br>
            <span style="font-size: 16px;">Order</span>
        </a></i>
        <a class="active" href="#">
            <i class="fas fa-history"style="font-size: 24px;"><br>
            <span style="font-size: 16px;">History</span>
        </a></i>
        <a class="active" href="profile">
            <i class="far fa-user-circle"style="font-size: 24px;"><br>
            <span style="font-size: 16px;">Profile</span>
        </a></i>
    </div>
@endsection
