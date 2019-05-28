<!--  get barber login php script here -->
<?php
include('action_barber.php')
?>
<!--  html code for barber login home page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Barber Login</title>
<link rel="stylesheet" type="text/css" href="../css/global_login_style.css">
</head>
<body>
<div class="barber_photo">
<img src="../images/barber_login.png" alt="barber login logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>Welcome to Automated Booking System For Barber Login</h1>
</div>
<div class="paragraph">
<p id="p1">This is the barber login page. You'll be directed to the barber's control panel once you loged in</p>
</div>
<div class="heading2">
<h2 id="h2">Please Login Here</h2>
</div>
<form method="POST" action="barber_login.php">
<!--  display error messages here -->
<?php
include('errors.php');
?>
 <fieldset>
<legend>Login with your username and password</legend><br>
  <div class="login_container">
    <label for="Username">Enter username: <input type="email" name="get_username"></label>
    
    <label for="Password">Enter password: <input type="password" name="get_password"></label>

    <input type="submit" id="submit_login_btn" name="login_btn" value="Log In">
   <input type="reset" id="reset_btn" value="Clear Input">
  </div>
  </fieldset>
</form>
<div class="forgot_link">
    <span id="spam_forgot_btn">Forgot Your Login Details?<button type="button" id="forgot_btn" onclick="window.location.href='user_forgot_form.php">Retrieve Your Login Instruction</button></span>
    </div>
<div class="paragraph2">    
<p id="p2">Try login later!</p>
</div>
<button type="button" id="go_back_btn" onclick="window.location.href='home.php'">Return to Login Home</button>
</body>
</html>