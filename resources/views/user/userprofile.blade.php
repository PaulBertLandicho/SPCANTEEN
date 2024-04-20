@extends('layout.userdashboard')

@section('title')
Profile
@endsection

@section('content')
  <header class="navbar border-bottom border-2 flex-md-nowrap p-0 shadow" style="height: 200px; background-color:maroon;" data-bs-theme="dark">
      <ul class="nav">
  <br><br><center><p style="color: white;font-size: 30px;margin-top: none; margin-left:40px;">PROFILE</p>

  <center><div class="container shadow" style="margin-left:40px; width: 350px; max-height: 175px; background-color:white; margin-top: 0px; border-radius: 10px;">  
  <div class="container"><a href="edit_profile" style="margin-left:140px;"><i class="fa fa-edit" style="color: maroon;"></i></a><br>
  <a href="#" style="text-decoration: none;">
  <h1 style="color: gray; font-size: 15px;">
  <img src="{{ asset('profileuploads/' . auth()->user()->pp) }}" style="width: 70px; height: 70px; border-radius: 50%;">
</h1>

      <center>
          <b><p style="color:black; font-size: 25px;">{{ auth()->user()->name }}</p></b>
          <h1 style="color: gray; font-size: 15px;">{{ auth()->user()->status }}</h1><br>
  </div>
    </ul>       
  </header>

  <div class="icon_bar" style="margin-top:110px; font-size:28px; margin-left:15px; margin-bottom: 90px; margin-top: 150px; ">
  <a href="userdashboard" style="text-decoration: none; display: flex; align-items: center; margin-bottom:55px;">
    <span class="fa fa-dashboard" style="margin-left:4px; background-color: maroon; color: white; border-radius: 50%; padding: 15px;"></span>
    <span style="color: black; margin-left: 15px;">Dashboard</span>
</a>
<a href="#" style="text-decoration: none; display: flex; align-items: center; margin-bottom:55px;">
    <span class="fa fa-history" style="margin-left:4px; background-color: maroon; color: white; border-radius: 50%; padding: 15px;"></span>
    <span style="color: black; margin-left: 15px;">Order&nbsp;History</span>
</a>
<a href="#" style="text-decoration: none; display: flex; align-items: center; margin-bottom:55px;">
    <span class="fa fa-info-circle" style="margin-left:4px; background-color: maroon; color: white; border-radius: 50%; padding: 15px;"></span>
    <span style="color: black; margin-left: 15px;">About</span>
</a> 

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="border:none; background-color: transparent; border-radius: 90%; margin-bottom:4px;">
        <span class="fa fa-sign-out" style="font-size:25px; background-color: maroon; color: white; border-radius: 80%; padding: 14px; margin-right:8px;"></span>
      </button>
      {{ __('Logout') }}
    </form>



  </div><br>

  <div class="icon-bar">
          <a class="active" href="userdashboard">
 <i class="fas fa-bars" style="font-size: 24px;"><br>
<span style="font-size: 16px;">Home</span>
</a></i>
<a class="active" href="#">
  <i class="fas fa-heart"><br>
  <span style="font-size: 16px;">Favorite</span>
</a></i>
<a class="active" href="#">
  <i class="fas fa-clipboard-list"style="font-size: 24px;"><br>
  <span style="font-size: 16px;">Order</span>
</a></i>
<a class="active" href="#">
  <i class="fas fa-history"style="font-size: 24px;"><br>
  <span style="font-size: 16px;">History</span>
</a></i>
<a class="active" href="userprofile">
  <i class="far fa-user-circle"style="font-size: 24px;"><br>
  <span style="font-size: 16px;">Profile</span>
</a></i> 
 @endsection