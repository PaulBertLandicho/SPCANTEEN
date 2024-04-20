<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCODEController extends Controller
{
    public function qrcode(Request $request)
    {
        // Retrieve the orders from the database
        $orders = Order::all();

        // Initialize QR code data and total payment
        $qrData = '';
        $totalPayment = 0;

        // Assuming you have a User model and the user is authenticated
        $user = $request->user();

        // Check if there are orders    
        if ($orders->isEmpty()) {
            // Set QR code data to display "No Orders found."
            $qrData = "No Orders found.";
        } else {
            // Generate QR code data based on order details
            foreach ($orders as $item) {
                // Concatenate order details to QR code data
                $qrData .= "" . $item->product->name . "\n------------------------\nx" . $item->quantity . "\n₱" . $item->product->price . "\n";

                // Calculate total payment
                $totalPayment += $item->product->price * $item->quantity;
            }

            $qrData .= "\n___________________________________________ ";

            // Include user's name and student ID in QR code data
            $qrData .= "\nUsername:------------------------\n" . $user->name . "\nStudent ID:-------------------\n" . $user->student_id;

            // Assuming payment details are fields in the Order model
            $paymentDetails = "" . $item->payment_details;

            // Concatenate payment details to QR code data
            $qrData .= "\nPayment Details:------------------------\n" . $paymentDetails;

            // Append total payment to QR code data
            $qrData .= "\nTotal Payment:--------------- ₱" . $totalPayment;
        }

        // Generate QR code image with specified encoding
        $qrcode = QrCode::size(200)->encoding('UTF-8')->generate($qrData);

        // Pass the QR code and total payment to the view
        return view('user.myqrcode', compact('qrcode', 'totalPayment'));
    }
}
