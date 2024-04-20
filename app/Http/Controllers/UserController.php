<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Product; // Import the Product model


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::query();

        if ($search) {
            $users->where('name', 'LIKE', '%' . $search . '%');
        }

        $users = $users->get();

        return view('superadmin.manage_users', compact('users', 'search'));
    }

    public function edit(User $user)
    {
        return view('superadmin.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|string|max:255',
        ]);

      

        // Update the user with the validated data
        $user->update($validatedData);

        // Redirect to the desired page after updating the user
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    public function dashboardindex(Request $request)
{
    $search = $request->input('search');
    $products = Product::query();

    // If search query is provided, filter products by name
    if ($search) {
        $products->where('name', 'LIKE', '%' . $search . '%');
    }

    // Retrieve all products from the database
    $products = $products->get();

    // Return the view with the products data
    return view('user.userdashboard', compact('products', 'search'));
}
}