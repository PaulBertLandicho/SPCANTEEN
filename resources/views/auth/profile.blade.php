<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setup Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<style>
    body {
        padding: 0;
        margin-top: 1%;
        background-color: white;
    }

    /* Style for rounded profile picture */
    .avatar {
        border-radius: 50%;
    }

    /* Style for hiding file input */
    #fileInput {
        display: none;
    }

    /* Style for round background for camera icon */
    .camera-icon-bg {
        background-color: lightgray;
        border-radius: 50%;
        padding: 5px;
    }
</style>

<div class="container text-center"> <!-- Wrap the content in a Bootstrap container -->
    <h1 style="color: black;"><b>WELCOME</b></h1>
    <center> <b><p style="color:Darkblue; font-size: 25px; ">{{ auth()->user()->name }}!</p></b></center>
    <br><br>
    <center>
    <div class="container">
        <!-- Update your existing form in the profile.blade.php file -->
        <form id="profileForm" action="{{ route('update.status') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Add the file input for profile picture -->
            <input type="file" id="profilePicture" name="profile_picture" accept="image/*" onchange="previewProfilePicture(this);" style="display: none;">
            <br>
            <div style="position: relative; display: inline-block;">
                <img id="avatarImage" src="/uploads/avatars/defaults.jpg{{ $user->pp }}" style="width: 200px; height: 200px; border-radius: 50%;">
                <label for="profilePicture" style="position: absolute; bottom: 5px; right: 5px;">
                    <span class="camera-icon-bg"><i class="fas fa-camera" style="cursor: pointer;"></i></span>
                </label>
            </div>
            
            
            <p style="color:red; font-size:13px; margin-top:45px;">Note: Don't forget to choose your status</p>

            <input type="radio" id="status_student" name="status" value="Student">
            <label for="status_student" style="margin-right:50px;"><b>Student</b></label>
            <input type="radio" id="status_faculty" name="status" value="Faculty">
            <label for="status_faculty"><b>Faculty</b></label><br><br> 

            <p>If done setting up your account,<br>
            please click the button below to continue.</p>

            <button id="submitButton" type="submit" class="btn btn-primary" style="background-color: maroon; width: 150px; color: white; text-decoration: none; display: inline-block;">Done</button>
        </form>    <!-- Form ends here -->
    </div>

<script>
    // Function to preview profile picture
    function previewProfilePicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('avatarImage').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>
