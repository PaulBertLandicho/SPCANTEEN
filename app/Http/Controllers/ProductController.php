<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.addproduct');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'time_to_cook' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Create the product directly in the database using the DB facade
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'time_to_cook' => $request->time_to_cook,
            'image' => $imageName,
            'available' => true, // Assuming true is the default value for available
        ]);

        // Redirect back with success message
        return redirect()->route('admin.addproductlist');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query();

        if ($search) {
            $products->where('name', 'LIKE', '%' . $search . '%');
        }
        $products = $products->paginate(6);
        // Retrieve all products from the database

        // Return the view with the products data
        return view('admin.addproductlist', compact('products', 'search'));

    }   

    public function destroy(Product $product)
{
    $product->delete();
    return back()->with('success', 'Product deleted successfully.');
}

public function edit(Product $product)
    {
        return view('admin.productedit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
{
    // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'time_to_cook' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Make image field optional
    ]);

    // Update the available field based on input value
    $available = $request->input('available') == '1' ? true : false;
    $validatedData['available'] = $available;
    
    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $validatedData['image'] = $imageName; // Update the image name in validated data
    }

    // Update the product with the validated data
    $product->update($validatedData);

    // Redirect back to the addproductlist page with a success message
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}
}