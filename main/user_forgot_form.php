<!--  get forgotten username or password script here -->
<?php
include('action_customer.php' . 'action_barber.php')
?>

<!--  html code for forgotten  username or password page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Forgotten Username or Password Page</title>
<link rel="stylesheet" type="text/css" href="../css/global_login_style.css">
</head>
<body>
<div class="send_email_photo">
<img src="../images/mail-send.png" alt="send mail logo" width="180" height="180">
</div>
<div class="heading_header">
<h1>Forgotten Username or Password</h1>
</div>
<div class="paragraph">
<p id="p1">Forgotten username or password? No problem! Retrieve reset login details below.
<br>Please provide your email to retrieve reset login instruction</p>
</div>
<form method="POST" action="user_forgot_form.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
  <div class="form_container">
    <label for="Username">Enter username email: *<input type="email" name="get_username"></label>
    
    <button type="submit" id="for_forgot_btn" name="forgot_btn" value="submitted">Get Reset Login</button>   
 </div>
 </form>
 <div class="paragraph2">
 <p id="p2">Click return to login page.</p>
 </div>
<button type="button" id="go_back_btn" onclick="window.location.href='home.php'">Return to Login Home</button>

</body>
</html>