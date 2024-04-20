@extends('layout.userdashboard')

@section('title')
My QRCode
@endsection

@section('content')
  <header class="navbar border-bottom border-2 flex-md-nowrap p-0 shadow" style="height: 200px; background-color:maroon;" data-bs-theme="dark">
      <ul class="nav">
  <br><br><center><p style="color: white;font-size: 30px;margin-top: none; margin-left:40px;">My QRCode</p>

  <div class="container shadow" style="margin-left: 35px; width: 350px; max-height: 175px; background-color:white; margin-top: 0px; border-radius: 10px;">  
  <br>
  <a href="#" style="text-decoration: none;">
  <h1 style="color: gray; font-size: 15px;">
  <img src="{{ asset('profileuploads/' . auth()->user()->pp) }}" style="width: 70px; height: 70px; border-radius: 50%;">
</h1>

      
          <b><p style="color:black; font-size: 25px;">{{ auth()->user()->name }}</p></b>
          <h1 style="color: gray; font-size: 15px;">{{ auth()->user()->status }}</h1><br>
  </div>
    </ul>       
  </header>

  
  <div id="qrcode-container" style="text-align: center; margin-top: 70px; margin-left:65px;margin-right:65px;">
    {!! $qrcode !!}
    </div></center>

    <script>
        // Function to generate the QR code and display it
        function generateQR() {
            // Show the QR code
            document.getElementById('qrcode').style.display = 'block';
        }
    </script></a>


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
<a class="active" href="order">
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