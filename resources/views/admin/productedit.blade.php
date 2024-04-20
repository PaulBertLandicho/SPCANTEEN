@extends('layout.admindashboard')

@section('title')
Edit Product
@endsection

@section('content')
    <div class="container ">
        <h1 class="mb-4">Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="time_to_cook" class="form-label">Time to Cook (in minutes):</label>
                <input type="text" class="form-control" id="time_to_cook" name="time_to_cook" value="{{ $product->time_to_cook }}" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="available" name="available" value="1" {{ $product->available ? 'checked' : '' }}>
                <label class="form-check-label" for="available">Availability:</label>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" class="mt-3 img-thumbnail" style="width: 100px; height: 100px;">
            </div>
            
            <button type="submit" class="btn btn-danger">Save Changes</button>
        </form>
    </div>

@endsection