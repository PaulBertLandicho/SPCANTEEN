<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderHistory;

class OrderHistoryController extends Controller
{
    public function index()
    {
        // Retrieve order history records
        $orderHistory = OrderHistory::all(); // Adjust this query as needed

        // Pass order history data to the view
        return view('user.orderhistory', ['orderHistory' => $orderHistory]);
    }
}
