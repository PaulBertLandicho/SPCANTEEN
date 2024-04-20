@extends('layout.loginregisterpage') @section('title') Sign In @endsection @section('content') <div class="form-box">
  <div class="center-icon">
    <center>
      <img src="https://i.ibb.co/7QLKBSz/423062764-1342544113808335-7405620093325838006-n-removebg-preview.png" alt="423062764-1342544113808335-7405620093325838006-n-removebg-preview" style="width:350px; height:180px; margin: 70px 0 55px 0;">
      <form method="POST" action="{{ route('login') }}"> @csrf <div class="input-container">
          <i class="fas fa-user-circle"></i>
          <input type="text" class="input-field" placeholder="Email" name="email">
        </div>
        <br>
        <br>
        <br>
        <div class="input-container">
          <i class="fas fa-lock"></i>
          <input type="password" class="input-field" placeholder="Password" name="password">
          <i class="far fa-eye show-hide-password" onclick="togglePassword(this, 'password')"></i>
        </div>
        <a href="forgotpassword" class="forgot-password">Forgot password?</a>
        <br>
        <br>
        <br>
        <center>
        <button type="submit" class="submit" value="Login" style="width: 110px; font-size:17px; height: 50px; background-color: maroon; color: #fff; border: none; border-radius: 3px;">Login</button>          <br>
          <br>
        <center>
          <p class="message">Don't have any account? <a href="register" style="color:maroon; text-decoration: none;">Register</a>
          </p>
      </form>
  </div>
</div>
</div>
</div>
</div>
<script src="js/script.js"></script> @endsection