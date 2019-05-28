<!--  get delete barber and customer php script here -->
<?php
include('action_administrator.php')
?>
<!--  html code for delete barber or customer page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Delete Barber or Customer Accounts</title>
<link rel="stylesheet" type="text/css" href="../css/administrators.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/delete.png" alt="delete barber logo" width="160" height="160">
</div>
<div class="heading_header">
<h1>Delete Barber or Customer Accounts</h1>
</div>
<div class="paragraph">
<p id="p1">You could only delete an existing barber or customer account.<br>
    <br>
<br>Please provide user's username to delete their accounts.</p>
</div>
    <br>
<form method="POST" action="administrator_delete.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="delete_form_container">
    <label for="Username">Enter Username email: *</label>
    <input type="email" name="get_username">

    <button type="submit" id="delete_btn" name="delete_btn" value="submitted">Delete Account</button>
   <button type="reset" id="reset_btn">Clear Input</button>
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to administrator control panel.</p>
   </div>
<button type="button" id="go_back_btn" onclick="window.location.href='administrator_control_ui.php'">Return to Administrator Control Panel</button>

</body>
</html>