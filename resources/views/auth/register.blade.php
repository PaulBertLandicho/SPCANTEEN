@extends('layout.loginregisterpage') @section('title') Sign Up @endsection @section('content') 
<div class="form-box">
  <div class="center-icon">
    <center>
      <img src="https://i.ibb.co/7QLKBSz/423062764-1342544113808335-7405620093325838006-n-removebg-preview.png" alt="423062764-1342544113808335-7405620093325838006-n-removebg-preview" style="width:350px; height:180px; margin: 50px 0 55px 0;">
      <form method="POST" action="{{ route('register') }}"> @csrf <div class="input-container">
          <i class="fas fa-user-circle"></i>
          <input type="text" class="input-field" placeholder="Name" name="name"> @error('name') <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <br>
        <div class="input-container">
          <i class="fas fa-envelope"></i>
          <input type="email" class="input-field" placeholder="Email" name="email"> @error('email') <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <br>
        <div class="input-container">
          <i class="fas fa-lock"></i>
          <input type="password" class="input-field" placeholder="Password" name="password">
          <i class="far fa-eye show-hide-password" onclick="togglePassword(this, 'password')"></i> @error('password') <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <br>
        <div class="input-container">
          <i class="fas fa-lock"></i>
          <input type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
          <i class="far fa-eye show-hide-password" onclick="togglePassword(this, 'password_confirmation')"></i>
        </div>
        <br>
        <br>
        <center>
          <button type="submit" style="width: 110px; font-size:17px; height: 50px; background-color: maroon; color: #fff; border: none; border-radius: 3px;">Register</button>
          <br>
          <br>
          <br>
          <p class="message">Already have an account? <a href="login" style="color:maroon; text-decoration: none;">Login</a>
          </p>
      </form>
      </form>
  </div>
  <script>
    function togglePassword(icon, field) {
      var passwordField = icon.previousElementSibling;
      if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script> 
@endsection