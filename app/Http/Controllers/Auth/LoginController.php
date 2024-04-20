<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Updated import statement
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('userdashboard');
        }

        $email = $request->input('email');
        $password = $request->input('password');

        // Perform custom authentication logic
        if ($email === "admin@gmail" && $password === "admin") {
            // For admin user
            return redirect()->route('admin.admindashboard'); // Redirect to admin dashboard
        }

        // Check if the credentials match a super admin
        if ($email === "superadmin@gmail" && $password === "superadmin") {
          // For admin user
          return redirect()->route('superadmindashboard'); // Redirect to admin dashboard
        }

        // If no user found or wrong password, redirect back with error
        return redirect()->route('login')->with('error', 'Wrong Email/Password');
    }

    public function logout(Request $request)
    {
        // Clear session data
        $request->session()->flush();

        return redirect('/login');
    }

    public function adminDashboard()
    {
        // Logic for displaying admin dashboard
        // For example:
        // return view('admin.admindashboard');
        return view('admin.admindashboard');
    }

public function superadminDashboard()
{
    // Logic for displaying admin dashboard
    // For example:
    // return view('admin.admindashboard');
    return view('superadmin.superadmindashboard');
}
}