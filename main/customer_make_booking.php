<!--  get customer make booking php script here -->
<?php
include('action_customer.php')
?>
<!--  html code for make booking page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Customer Makes Booking</title>
<link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
<div class="customer_photo">
<img src="../images/make_booking.png" alt="customer make booking logo" width="180" height="180">
</div>
<div class="heading_header">
<h1>Customer Makes Bookings</h1>
</div>
<div class="paragraph">
<p id="p1">You could only make booking when free slots are available by barbers.<br>
<br>Please provide your username, choose free slots to make booking.</p>
</div>
<form method="POST" action="customer_make_booking.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="make_booking_form_container">
    <label for="Username Email">Enter your username email: *</label>
    <input type="email" name="get_username">
<!--
<label for="Free Slot">Choose barber's free date and time: *</label>
    <input type="datetime-local" name="get_datetime">
-->
    <label for="Make Booking">Type your booking confirmation: *</label>
    <input type="email" name="get_confirm_booking">

    <input type="submit" id="make_booking_btn" name="make_booking_btn" value="Make Booking">
   <input type="reset" id="reset_btn" value="Clear Input">
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Customer Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='customer_control_ui.php'">Return to Customer Control Panel</button>

</body>
</html>