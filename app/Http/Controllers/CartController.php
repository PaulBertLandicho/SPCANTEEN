<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model
use App\Models\Cart; // Assuming you have a Cart model

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        // Retrieve the cart items from the database
        $cartItems = Cart::all(); // Adjust this query based on your database structure
        
        // Pass the cart items to the view for displaying
        return view('user.cartlist', ['cartItems' => $cartItems]);
    }

    public function add(Request $request, $productId)
{
    // Find the product by ID
    $product = Product::findOrFail($productId);

    // Create a new cart item
    $cartItem = new Cart();
    $cartItem->product_id = $product->id;
    $cartItem->user_id = auth()->id(); // Assign the authenticated user's ID
    $cartItem->save();

    // Retrieve the updated cart count
    $cartCount = Cart::where('user_id', auth()->id())->count();

    // Return the updated cart count along with the response
    return response()->json(['message' => 'Product added to cart successfully', 'cartCount' => $cartCount]);
}


    public function destroy($product_id)
{
    $cartItem = Cart::findOrFail($product_id);
    $cartItem->delete();
    return back()->with('success', 'Product deleted successfully.');
}

public function updateQuantity(Request $request)
{
    $productId = $request->input('update_quantity_id');
    $newQuantity = $request->input('new_quantity');
    
    $cartItem = Cart::where('product_id', $productId)->firstOrFail();
    $cartItem->quantity = $newQuantity;
    $cartItem->save();
    
    return back()->with('success', 'Quantity updated successfully.');
}
}