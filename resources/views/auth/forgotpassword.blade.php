@extends('layout.loginregisterpage')

@section('title')
Forgot Password
@endsection
	
	<center><div class="" style="max-width: 350px; background-color: white;">
<br><br><br><br><br>
		 <h1><b>Forgot Password</h1> <br>
         <p> Enter Email Address </b></p>

		<form method="POST">
         <div class="form-group mb-3">
    <input type="text" class="input-field form-control form-control-lg" placeholder="example@gmail.com" name="email">
</div><br>
         <div class="form-group mb-3">
    <button a type="submit" class="btn btn-primary"  style="background-color: maroon; width: 350px; color: white;" role="button">SEND</a>
</div>
<p> Or </p>
<div class="form-group mb-3">
    <a class="btn btn-primary" href="register" style="background-color: white; width: 350px; color: maroon;" role="button">SIGN  UP</a>
</div>
		
</form>

@endsection