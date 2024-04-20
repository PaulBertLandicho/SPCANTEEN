<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a User model

class ProfileController extends Controller
{
    public function index()
    {
        // Retrieve user data
        $user = auth()->user(); // Assuming you are using Laravel's built-in authentication

        return view('auth.profile', compact('user'));
    }

    public function updateStatus(Request $request)
{
    // Validate the request data
    $request->validate([
        'status' => 'required', // Adjust validation rules as needed
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the profile picture
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Update the user's status
    $user->status = $request->input('status');

    // Handle profile picture upload if provided
    if ($request->hasFile('profile_picture')) {
        // Store the uploaded profile picture
        $profilePicture = $request->file('profile_picture');
        $profilePictureName = time() . '_' . $profilePicture->getClientOriginalName();
        $profilePicture->move(public_path('profileuploads'), $profilePictureName);
        
        // Update the user's profile picture in the database
        $user->pp = $profilePictureName;
    }

    // Save the user
    $user->save();

    // Redirect with success message
    return redirect()->route('userdashboard')->with('status', 'Status and profile picture updated successfully.');
}


public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'student_id' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Update the user's information
    $user->name = $request->input('name');
    $user->status = $request->input('status');
    $user->student_id = $request->input('student_id');


    // Handle profile picture upload if provided
if ($request->hasFile('profile_picture')) {
    // Store the uploaded profile picture with a unique filename
    $profilePicture = $request->file('profile_picture');
    $profilePictureName = time() . '_' . $profilePicture->getClientOriginalName();
    $profilePicture->move(public_path('profileuploads'), $profilePictureName);
    
    // Update the user's profile picture in the database
    $user->pp = $profilePictureName;
}

// Save the user
$user->save();

    // Redirect back to the profile page with a success message
    return view('user.userprofile')->with('success', 'Profile updated successfully.');
}
}