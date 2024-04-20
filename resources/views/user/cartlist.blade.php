@extends('layout.cartlist')

@section('title')
Cart List
@endsection

@section('content')
<center><h2><b>MY CART</b></center></h2><br>

<form action="{{ route('order.place') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary" style="margin-bottom:5px;background-color: maroon; width: 150px; margin-left:240px; color: white; border-color:maroon; border-radius:10px; height:45px; font-size:20px;" role="button">Place Order</button>
</form>
<div class="products-container" style="max-height: 670px; margin-top:20px; overflow-y: auto;">
@foreach($cartItems as $item)    
<div class="product-container">
    <div class="product-image">     
    <img src="{{ asset('images/' . $item->product->image) }}" alt="Product Image" style="width: 110px; height: 110px;">
    </div>
    <div class="product-details"> 
    <span class="product-name" style="font-size: 20px; font-weight: none;">{{ $item->product->name }}</span><br>
    <span class="product-total-price" style="font-size:20px;">₱{{ $item->product->price }}</span>
            <!-- Add more details as needed -->
            <form action="{{ route('cart.update.quantity') }}" method="POST" style="margin-left: 70px;">
            @csrf
            <input type="hidden" name="update_quantity_id" value="{{ $item->product_id }}">
            <button type="submit" name="new_quantity" value="{{ ($item->quantity - 1) }}" class="button-maroon"><i class="fas fa-minus" style="color: white;"></i></button>
            <input type="number" name="new_quantity" value="{{ $item->quantity }}" class="quantity-input">
            <button type="submit" name="new_quantity" value="{{ ($item->quantity + 1) }}" class="button-maroon"><i class="fas fa-plus" style="color: white;"></i></button>
        </form>
        <form action="{{ route('cart.destroy', ['cart' => $item->product_id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" style="border:none; border-color: white; background-color: white; border-radius: 3px; font-size: 18px; margin-left: 210px;">
                <i class="fas fa-trash-alt" style="font-size: 17px; color: maroon;"></i>
            </button>
        </form>
        </div>
                </div>

    @endforeach
    </div><br>

<div class="icon-bar">
 <a class="active" href="userdashboard">
 <i class="fas fa-bars" style="font-size: 24px;"><br>
<span style="font-size: 16px;">Home</span>
</a></i>
<a class="active" href="#">
  <i class="fas fa-heart"><br>
  <span style="font-size: 16px;">Favorite</span>
</a></i>
<a class="active" href="order">
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

@endsection