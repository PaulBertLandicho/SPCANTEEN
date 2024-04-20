@extends('layout.admindashboard')

@section('title')
Order Scanner
@endsection

@section('content')
@include('layout.adminNavbar')

<style>
        /* Styles for the container box */
        .container {
            width: 400px; /* Adjust the width as needed */
            margin: 20px auto; /* Center the container horizontally with some top margin */
            padding: 20px;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 2.1);
            text-align: center; /* Center the content inside the container */
        }
        /* Styles for the result text */
        #result {
            color: gray;
            font-size: 18px;
            line-height: 1.6; /* Adjust the line height for proper spacing */
            text-align: center; /* Center the content inside the container */

    }        
    </style>
 <div class="container-box" style="max-width: 1200px; margin-bottom: 450px; margin-left: 15px; background-color: lightgray;">
        <h1><b>QR Code Scanner</b></h1>
</div>
<script src="js/qrScript.js"></script>
    <div style="text-align: center;">
        <div id="reader" style="width: 500px; margin: 0 auto; margin-top: 80px; display: block;"></div>
        <div id="show" style="display: none;">
            <div class="container">
            <i class="fas fa-check-circle" style="margin-right: 10px; color: green;"></i>
        <h4>Payment Success!</h4>
<br>
        <!-- Display the scanned result inside this paragraph -->
                <h3 id="result"></h3>
            </div>
        </div><br>
            <!-- SCAN button -->
            <button id="scanButton" style="width: 150px; font-size: 17px; height: 50px; background-color: maroon; color: #fff; border: none; border-radius: 3px;">SCAN</button>
            <!-- Restart button -->
        </div>
    </div>
    <script src="js/qrscanner.js"></script>
      @endsection
