<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Profile</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/user_dashboard.css">
  </head>
  <body>
  <style>
      body {margin-top: 17px; background-color:lightgray;}

  /* Media query for responsiveness */
  @media screen and (max-width: 768px) {
      .iconbar {
          display: show; /* Hide the icon bar on smaller screens */
      }
  }

  .iconbar {
  width: 100%;
  background-color: maroon;
  overflow: auto;
  margin-top:650px;
}

.iconbar a {
  float: left;
  width: 20%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 25px;
}
.container {
    display: flex;
}
.radio-container {
        border: 2px solid white; /* Border style */
        background-color:white;
        padding: 10px; /* Padding to create space between the border and content */
        border-radius: 10px;;
        width:350px;
        box-shadow: 0 15px 4px rgba(0, 0, 0, 0.1); /* Add box-shadow */

    }
    .radio{
        border: 2px solid white; /* Border style */
        background-color:white;
        padding: 21px; /* Padding to create space between the border and content */
        border-radius: 10px;;
        width:350px;
        height:125px;
    }
    .h2{
        margin-top:500px;
    }
    .fa-dot-circle{ 
        font-size: 15px; /* Adjust size as needed */
        text-decoration: none; /* Remove underline */
        color: blue; /* Set color */
        display: inline-block; /* Display as inline block */
        margin-right:5px;
    }
  </style>
<div>
<center><h2><b>G-CASH PAYMENT</b></h2>
    <div class="container">
    <a href="Order.php" class="left-arrow"><i class="fas fa-arrow-left"style="color:black;"></i></a>
</div>
<br>
<form action="{{ route('process.payment') }}" method="POST">
    @csrf
        <div class="radio-container"style="padding:15px; width:375px;">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj-EaNUX7Xl0MvpH9sX9_ptLkN2lv76t7v3n4SxRIlIg&s" alt="Your Image" width="50" height="50" style="border-radius: 50%;">
        <label for="status_student"><b>G-CASH</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" id="status_gcash" name="payment_details" value="g-cash" checked>
    </div><br>
    <div class="radio-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0aNkoR9NYk75SeOo-Qu0hHF5HD0mEWppH74MKaUloTg&s" alt="Your Image" width="50" height="50">
        <label for="status_faculty"><b>School Fee</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" id="status" name="payment_details" value="Student" onclick="navigateToschoolfee()">
    </div><br>
    <div class="radio-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShl6fu0z5vqJWKZYIA12KxYdcenv-JwFcUTtdyzVo2Jw&s" alt="Your Image" width="50" height="50">
        <label for="status_student"><b>Cash On Hand</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" id="status" name="payment_details" value="Student" onclick="navigateTocashonhand()">
    </div>
<br><br><br>
<div class="radio">
                <!-- Display total items -->
            <div style="margin-right: 18px;">Selected Items: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $total_items }}</div>

            <!-- Insert line above total payment -->
            <hr>

            <!-- Display total price -->
            <div style="margin-right:10px;"><strong>Total Payment: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₱{{ $total_price }}</strong></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="background-color: maroon; width: 300px; color: white; border-color:maroon; border-radius:10px; height:45px; font-size:20px;"><b>PAY NOW</button>
        </div>
    </form>
    </center><br><br><br>

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
<a class="active" href="profile">
  <i class="far fa-user-circle"style="font-size: 24px;"><br>
  <span style="font-size: 16px;">Profile</span>
</a></i>
<script>
    function navigateToschoolfee() {
    window.location.href = "payschoolfee";
}
function navigateTocashonhand() {
    window.location.href = "cashonhand";
}
</script>
</body>
</html>
