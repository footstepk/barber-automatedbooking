<!--  get customer view booking php script here -->
<?php
include('action_customer.php')
?>
<!--  html code for view customer booking page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Customer View Bookings</title>
<link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
<div class="customer_photo">
<img src="../images/customer_view_booking.png" alt="customer view booking logo" width="180" height="180">
</div>
<div class="heading_header">
<h1>Customer View Bookings</h1>
</div>
<div class="paragraph">
<p id="p1">You could only view an existing bookings.<br>
<br>Please provide user's username to view your bookings.</p>
</div>
<form method="POST" action="customer_view_booking.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="view_booking_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_username">

    <input type="submit" id="view_booking_btn" name="view_booking_btn" value="View Booking">
   <input type="reset" id="reset_btn" value="Clear Input">
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Customer Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='customer_control_ui.php'">Return to Customerr Control Panel</button>

</body>
</html>