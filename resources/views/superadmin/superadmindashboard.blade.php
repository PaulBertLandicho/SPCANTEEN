@extends('layout.admindashboard')

@section('title')
Super Admin
@endsection

@section('content')
@include('layout.superadminNavbar')

    <div class="container-shadow">
      <div class="container">
      <h1 style="margin-top: 20px;">
          <b>Hello Super Admin!</b>
        </h1>
        <div class="topp">
          <div class="box">
            <img class="boxImg" src="uploads/avatars/first.png" alt="first.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/second.png" alt="second.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/third.png" alt="third.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/first.png" alt="fourth.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
        </div>
        <div class="bottomm">
          <img class="chart" src="uploads/avatars/chart.png" alt="chart.png">
        </div>
      </div>
  @endsection