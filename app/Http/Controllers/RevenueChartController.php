<?php

// RevenueChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class RevenueChartController extends Controller
{
    public function index()
    {
        // Retrieve orders within the past week
        $startDate = now()->subDays(7);
        $endDate = now();
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        // Prepare data for chart
        $weeklyRevenue = $orders->groupBy(function($order) {
            return $order->created_at->format('D'); // Group by day
        })->map(function($dayOrders) {
            return $dayOrders->sum(function($order) {
                return $order->quantity * $order->product->price; // Calculate revenue for the day
            });
        })->toArray();

        // Labels for the chart
        $labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $data = [];
        foreach ($labels as $label) {
            $data[] = $weeklyRevenue[$label] ?? 0;
        }

        // Pass data to the view
        return view('admin.admindashboard', [
            'data' => $data,
        ]);
    }
}
