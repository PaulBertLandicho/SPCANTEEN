@extends('layout.addproduct')

@section('title')
Add Product
@endsection

@section('content')
   
@include('layout.adminNavbar')

<div class="container">
        <div class="floating-container">
<div class="container">
    <center>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div style="position: relative; display: inline-block; margin-top: 8px; margin-bottom: 10px;">
            <img id="avatarImage" src="/uploads/avatars/product.jpg" style="width: 199px; height: 190px; cursor: pointer;" onclick="document.getElementById('profilePicture').click();" />
    <input type="file" id="profilePicture" name="image" accept="image/*" onchange="previewProfilePicture(this);" style="display: none;">
       </div>
            <label for="name" style="margin-right:60px; font-weight:bold; margin-top:15px;">Product Name: 
        <input type="text" id="name" name="name" required>
        
        <label for="price" style="margin-top:15px;">Product Price:
       <input type="number" id="price" placeholder="₱" name="price"  required><br>
        
 <label for="category"style="margin-top:15px;margin-right:80px; font-weight:bold;">Select Category:    
       <select name="category" id="category" required>
            <option value="1">Breakfast</option>
            <option value="2">Lunch</option>
            <option value="3">Snack</option>
            <!-- Add more options as needed -->
        </select><br>
          
        <label for="time_to_cook" style="margin-top:15px; margin-left:77px;">Time:
       <input type="text" id="time_to_cook" name="time_to_cook" required style="width: 100px; height: 30px; padding: 5px;"></label><br><br>
        
        
        
       <input type="submit" value="Add Product" class="add-product-button" style="margin-left:20px;">    </form>
       <button type="button" onclick="window.location.href='addproductlist'" style="width: 100px; font-size: 17px; height: 40px; background-color: maroon; color: #fff; border: none; border-radius: 3px;">Cancel</button>
    <script>
    // Function to preview profile picture
    function previewProfilePicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('avatarImage').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
