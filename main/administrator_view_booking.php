<!--  get view barber and customer php script here -->
<?php
include('action_administrator.php')
?>
<!--  html code for view barber or customer booking page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - View Barber or Customer Booking</title>
<link rel="stylesheet" type="text/css" href="../css/administrators.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/admin_view_booking.png" alt="view bookings logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>View Barber or Customer Bookings</h1>
</div>
<div class="paragraph">
<p id="p1">You could only view an existing barber or customer bookings.<br>
<br>
<br>Please provide user's username to view their bookings.</p>
</div>
<form method="POST" action="administrator_view_booking.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="view_booking_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_username">

    <button type="submit" id="view_booking_btn" name="view_booking_btn">View Booking</button>
   <button type="reset" id="reset_btn">Clear Input</button>
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Administrator Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='administrator_control_ui.php'">Return to Administrator Control Panel</button>

</body>
</html>