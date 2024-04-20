@extends('layout.admindashboard')

@section('title')
Manage User
@endsection

@section('content')
    @include('layout.superadminNavbar')
    <div class="container" style="max-width: 1200px; margin-top: 0px; height:500px; background-color: lightgray;">
      <h2>
        <b>Manage Users</b>
      </h2>
      <!-- Search Bar -->
      <div class="container">
        <div class="search-form">
        <form action="{{ route('users.index') }}" method="GET" class="search-form">
         <input type="text" name="search" placeholder="Search User...">
            <button type="submit" class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </form>
          <br>
        </div>
        <table class="table">
    <thead>
        <tr>
            <th>Profile Picture</th>
            <th>Username</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr>
        <td><img src="{{ asset('profileuploads/' . $user->pp) }}" alt="User Profile" style="width: 50px; height: 50px; border-radius: 50%; margin-left:15px;"></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->student_id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->status }}</td>
            <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Remove</button>
    </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No results found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
      </div>
 @endsection


 