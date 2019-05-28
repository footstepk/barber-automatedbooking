<!--  get administrator login php script here -->
<?php
include('action_administrator.php')
?>
<!--  html code for administrator login home page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Administrator Login</title>
<link rel="stylesheet" type="text/css" href="../css/global_login_style.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/admin_login.png" alt="administrator login logo" width="50" height="50">
</div>
<div class="heading_header">
<h1>Welcome to Automated Booking System For Administrator Login</h1>
</div>
<div class="paragraph">
<p id="p1">This is the administrator login page. You'll be directed to the administrator's control panel once you loged in</p>
</div>
<div class="heading2">
<h2 id="h2">Please Login Here</h2>
</div>
<form method="POST" action="administrator_login.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
 <fieldset>
<legend>Login with your username and password</legend>
  <div class="administrator_login_container">
    <label for="Username">Enter username: <input type="email" name="get_username"></label>
    
    <label for="Password">Enter password: <input type="password" name="get_password"></label>

    <input type="submit" id="submit_login_btn" name="login_btn" value="Log In">
   <input type="reset" id="reset_btn" value="Clear Input">
  </div>
  </fieldset>
</form>
<div class="paragraph2">    
<p id="p2">Try login later!</p>
</div>
<button type="button" id="go_back_btn" onclick="window.location.href='home.php'">Return to Login Home</button>
</body>
</html>