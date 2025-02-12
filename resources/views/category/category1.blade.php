@extends('layout.userdashboard')

@section('title')
Breakfast
@endsection

@section('content')
<header class="navbar" style="width: auto; height: 100px;" data-bs-theme="dark">
    <h2>&nbsp; Hello {{ auth()->user()->name }}!</h2><br>
    <div style="display: flex; align-items: center;">
        <!-- Cart icon -->
        <a href="cartlist" class="cart-btn" style="color: maroon; font-size: 25px; margin-right: 10px; position: relative;">
            <i id="cart-icon" class="fas fa-shopping-cart"></i>
            <span id="cart-badge" class="badge"></span> <!-- Badge for displaying number of items -->
        </a>&nbsp;
<span class="picture">
    <img src="{{ asset('profileuploads/' . auth()->user()->pp) }}" style="width: 50px; height: 50px; border-radius: 50%; margin-right:15px;">
</span>

    </div>
</header>

<div class="icon-container">
    <div class="iconbar">
        <a href="userdashboard" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/512/5562/5562062.png" alt="Home"><div class="icon-text">&nbsp;&nbsp;&nbsp;All</div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="category1" style="text-decoration: none;"><img src="https://cdn-icons-png.freepik.com/256/3480/3480823.png" alt="Home"><div class="icon-text" style="color: black;">Breakfast</div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="category2" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/512/5787/5787212.png" alt="Home" ><div class="icon-text">&nbsp;&nbsp;Lunch</div></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="category3" style="text-decoration: none;"><img src="https://cdn-icons-png.freepik.com/512/2497/2497904.png" alt="Home"><div class="icon-text">&nbsp;&nbsp;Snack</div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="text-decoration: none;"><img src="https://cdn2.iconfinder.com/data/icons/food-72/192/.svg-12-512.png" alt="Home"><div class="icon-text">Beverage</div></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="text-decoration: none;"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSFf5pWRMd8tjnW9HrVQLO2Ir2yTQ2hQJCAvrUlxIdCGIbCRCTh" alt="Home"><div class="icon-text">&nbsp;Dinner</div></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/256/6030/6030105.png" alt="Home"><div class="icon-text">&nbsp;Dessert</div></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="text-decoration: none;"><img src="https://cdn.icon-icons.com/icons2/3277/PNG/512/salad_bowl_food_vegetables_vegan_healthy_food_icon_208011.png" alt="Home"><div class="icon-text">Healthy</div></a>&nbsp;&nbsp;
    </div>
</div>
<br>

<center><div class="search-box">
<form class="d-flex ms-auto" action="{{ route('categoryindex') }}" method="get">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input class="form-control me-2" type="search" name="search" placeholder="Search product . . . ." aria-label="Search">
      <i class="fas fa-search"></i></button>
    
</div></center><br>

<h3 style="text-align: center;font-size: 20px; font-weight: bold; margin: 0 auto; display: block;">Recommended
       <span style="font-size: 15px; font-weight: normal; margin-left:160px;">Breakfast</span>
</h3>
<br>
<center>
<div class="products-list-container">
        <div id="product-list">
            @if($products->isEmpty())
                <div class="no-product-found" style="margin-top: 80px;">
                    <h3>No products found</h3>
                </div>
            @else
        @php
        // Fetch products from category number 1
        $products = App\Models\Product::where('category', 1)->get();
        $foundProduct = false; // Initialize flag
        @endphp
        @foreach($products as $product)
        <div class="product-container">
            <div class="product-image" style="position: relative;">
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="width: 340px; height: 190px; border-radius: 15px;">
                <!-- Heart icon for adding to favorites -->
                <a href="javascript:void(0);" class="heart-btn" data-product-id="{{ $product->id }}">
                    <i id="heart-icon-{{ $product->id }}" class="far fa-heart" style="color:black; position: absolute; top: 10px; right: 10px; font-size: 25px; background-color: white; border-radius: 50%; padding: 5px;"></i>
                </a>
                <div class="product-details">
                    <!-- Display other product details -->
                    <a href="javascript:void(0);" class="cart-btn" style="right:10px; color: green; font-size: 18px;"><i class="fas fa-clock"></i></a>
                    <span style="font-size: 14px; margin-right:40px;">{{ $product->time_to_cook }}</span>
                    <!-- Display readiness status -->
                    @if ($product->available == 1)
                    <span style="color: green; margin-right:30px;"><i class="fas fa-check-circle"></i>Available</span>
                    @else
                    <span style="color: red; margin-right:20px;"><i class="fas fa-times-circle"></i> Not Available</span>
                    @endif
                    <a href="javascript:void(0);" class="add-to-cart-btn" data-product-id="{{ $product->id }}" style="color: maroon; font-size: 22px; display: inline-block;"><i class="fas fa-shopping-cart"></i></a><span style="font-size: 24px;">₱{{ $product->price }}</span>
                    <div class="product-actions">
                        <div class="product-name">{{ $product->name }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
            @endif
    </div>
</div>
</center>

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
<a class="active" href="userprofile">
  <i class="far fa-user-circle"style="font-size: 24px;"><br>
  <span style="font-size: 16px;">Profile</span>
</a></i> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/user_dashboard.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            
            const productId = this.getAttribute('data-product-id');
            
            // AJAX request to add product to cart
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Trigger bounce animation
                        button.classList.add('bounce');
                        
                        // Remove bounce animation after completion
                        button.addEventListener('animationend', function() {
                            button.classList.remove('bounce');
                        });
                    } else {
                        // Error handling
                        console.error('Failed to add product to cart');
                    }
                }
            };
            xhr.open('GET', 'add_to_cart.php?product_id=' + productId, true);
            xhr.send();
        });
    });
});
</script>
@endsection