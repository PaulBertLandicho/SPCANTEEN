@extends('layout.userdashboard')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Display current user information -->
            
            <p><img src="{{ asset('profileuploads/' . auth()->user()->pp) }}" alt="Profile Picture" style="width: 70px; height: 70px; border-radius:50%;"></p>

            <!-- Allow user to update information -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            </div>
            <div class="mb-3">
                <label for="student_id">Student ID:</label>
                <input type="text" class="form-control" name="student_id" id="student_id" value="{{ auth()->user()->student_id }}">

            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ auth()->user()->status }}">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
