<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart; // Assuming you have a Cart model
use App\Models\User; 

class OrderController extends Controller
{
    public function place(Request $request)
{
    // Retrieve the cart items for the current user
    $cartItems = Cart::where('user_id', auth()->id())->get();

    // Check if the cart is empty
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart is empty.');
    }

    // Create a new order and save it to the database
    $order = new Order();
    $order->user_id = auth()->id();
    $order->product_id = auth()->id();
    $order->ready = auth()->id();


    // Move cart items to the order
    foreach ($cartItems as $cartItem) {
        // Create order items and associate them with the order
        $orderItem = new Order();
        $orderItem->order_id = $order->id; // Automatically generated order_id
        $orderItem->product_id = $cartItem->product_id;
        $orderItem->user_id = $cartItem->user_id;
        $orderItem->ready = $cartItem->ready ?? true;
        $orderItem->quantity = $cartItem->quantity;
        
        // Add more fields as needed
        $orderItem->save();
        
        // Remove the cart item after adding it to the order
        $cartItem->delete();
    }

    // After placing the order, redirect the user to the order list page
    return view('user.payment');

}

 
public function list()
    {
        // Retrieve the list of orders from the database
        $orders = Order::all(); // Adjust this query based on your database structure
        
        // Return the view with the list of orders
        return view('user.order', ['orders' => $orders]);
    }

    public function destroy($product_id)
{
    $orderItem = Order::findOrFail($product_id);
    $orderItem->delete();
    return back()->with('success', 'Product deleted successfully.');
}

public function payment()
{
    // Retrieve all products in the user's orders based on their user_id
    $user_id = auth()->id();
    $orders = Order::where('user_id', $user_id)->with('product')->get();

    // Initialize total price and total items variables
    $total_price = 0;
    $total_items = 0;

    // Calculate total price and total items
    foreach ($orders as $order) {
        $product_price = $order->product->price * $order->quantity;
        $total_price += $product_price;
        $total_items += $order->quantity;
        $order->product_price = $product_price; // Add product price to order object
    }

    // Pass data to the view
    return view('user.gcashpay', compact('orders', 'total_price', 'total_items'));
}
public function schoolpayment()
{
    // Retrieve all products in the user's orders based on their user_id
    $user_id = auth()->id();
    $orders = Order::where('user_id', $user_id)->with('product')->get();

    // Initialize total price and total items variables
    $total_price = 0;
    $total_items = 0;

    // Calculate total price and total items
    foreach ($orders as $order) {
        $product_price = $order->product->price * $order->quantity;
        $total_price += $product_price;
        $total_items += $order->quantity;
        $order->product_price = $product_price; // Add product price to order object
    }

    // Pass data to the view
    return view('user.payschoolfee', compact('orders', 'total_price', 'total_items'));
}

public function onhandpayment()
{
    // Retrieve all products in the user's orders based on their user_id
    $user_id = auth()->id();
    $orders = Order::where('user_id', $user_id)->with('product')->get();

    // Initialize total price and total items variables
    $total_price = 0;
    $total_items = 0;

    // Calculate total price and total items
    foreach ($orders as $order) {
        $product_price = $order->product->price * $order->quantity;
        $total_price += $product_price;
        $total_items += $order->quantity;
        $order->product_price = $product_price; // Add product price to order object
    }

    // Pass data to the view
    return view('user.cashonhand', compact('orders', 'total_price', 'total_items'));
}

    public function index()
    {
        // Fetch users and their orders
        $users = User::with('orders.product')->get(); // Assuming you have defined the relationships correctly

        // Pass the data to the view
        return view('order.index', compact('users'));
    }


    public function process(Request $request)
    {
        // Assuming $users is retrieved from somewhere, like the database
        $users = User::with('orders.product')->get(); 
    
        foreach ($users as $user) {
            foreach ($user->orders as $order) {
                // Update the available field based on input value
                $ready = $request->input('ready_' . $order->id) == '1' ? true : false;
                $order->ready = $ready;
                $order->save();
            }
        }
    
        return view('admin.adminorderlist', compact('users'));
    }
    
}