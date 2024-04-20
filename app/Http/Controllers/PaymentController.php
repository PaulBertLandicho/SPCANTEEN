<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Handle the payment logic here
        // For example, save the payment details to the database
        $orders = Order::all();

        foreach ($orders as $order) {
            $order->payment_details = $request->input('payment_details'); // Adjust this based on your form fields
            $order->save();
        }

        // Redirect the user after processing the payment
        return redirect()->route('user.myqrcode')->with('success', 'Payment successful.');
    }
}

