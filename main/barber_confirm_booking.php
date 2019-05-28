<!--  get confirm customer booking php script here -->
<?php
include('action_barber.php')
?>
<!--  html code for confirm customer booking page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Barber Confirms Customer's Booking</title>
<link rel="stylesheet" type="text/css" href="../css/barbers.css">
</head>
<body>
<div class="barber_photo">
<img src="../images/barber_confirm_booking.png" alt="confirm customer booking logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>Barber Confirms Customer's Bookings</h1>
</div>
<div class="paragraph">
<p id="p1">You could only confirm an existing customer bookings.<br>
<br>Please provide user's username to confirm their bookings.</p>
</div>
<form method="POST" action="barber_confirm_booking.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="confirm_booking_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_barber_email">

    <label for="Confirm Booking">Confirm message to customer: *</label>
    <input type="text" name="get_confirm_message">

    <button type="submit" id="confirm_booking_btn" name="confirm_booking_btn">Confirm Booking</button>
   <button type="reset" id="reset_btn">Clear Input</button>
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Barber Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='barber_control_ui.php'">Return to Barber Control Panel</button>

</body>
</html>