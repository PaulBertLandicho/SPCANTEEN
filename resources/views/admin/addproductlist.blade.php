@extends('layout.adminproductlist')

@section('title')
Product List
@endsection

@section('content')
@include('layout.adminNavbar')
<div class="container">
    <div class="search-form">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    

    <a  href="addproduct" class="add-product-btn">
              <span style="font-size: 20px;" class="far fa-plus-square" >
                <span style="margin-left:5px; font-size: 20px;">Add Products</span>
            </a>
            <br><br>
<div id="product-list-container">
    @foreach($products as $product)
    <div class="product-container" style="position: relative;">
        <div class="product-image" style="position: relative;">
            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="width: 270px; height: 240px; border-radius: 15px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 5.1);">
        </div>
        <div class="product-details" style="position: absolute; top: 160px;  width: 270px; height: 100%; border-radius: 4px; max-height:100px; display: flex; flex-direction: column;  padding: 2px;  box-sizing: border-box;  z-index: 1; background: linear-gradient(to bottom, rgba(128, 0, 0, 0.5), rgba(128, 0, 0, 0.7));">
            <span style="color: {{ $product->available ? 'green' : 'red' }}; margin-right:10px;">
                <i class="fas {{ $product->available ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                {{ $product->available ? 'Available' : 'Not Available' }}
            </span>
            <div class="product-name">{{ $product->name }}</div>
            <div class="product-actions" style="position: absolute; top: 65px; left: 180px; z-index: 2; ">
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    <a href="{{ route('products.productedit', $product->id) }}" class="update-btn">
                        <i class="far fa-edit" style="font-size: 17px;"></i>
                    </a>
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
<div class="pagination">
    <a href="{{ $products->previousPageUrl() }}"><b>&laquo;</b></a>
    @for ($i = 1; $i <= $products->lastPage(); $i++)
        <a class="{{ $i == $products->currentPage() ? 'active' : '' }}" href="{{ $products->url($i) }}">{{ $i }}</a>
    @endfor
    <a href="{{ $products->nextPageUrl() }}"><b>&raquo;</b></a>
</div>
@endsection

