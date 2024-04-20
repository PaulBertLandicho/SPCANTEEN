<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function categoryindex(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // Query products belonging to category 1 and match the search query by name
        $products = Product::where('category', 1)
                           ->where('name', 'like', '%' . $search . '%')
                           ->get();

        return view('category.category1', compact('products'));
    }

    public function category2index(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // Query products belonging to category 1 and match the search query by name
        $products = Product::where('category', 2)
                           ->where('name', 'like', '%' . $search . '%')
                           ->get();

        return view('category.category2', compact('products'));
    }
    public function category3index(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // Query products belonging to category 1 and match the search query by name
        $products = Product::where('category', 3)
                           ->where('name', 'like', '%' . $search . '%')
                           ->get();

        return view('category.category3', compact('products'));
    }
}