<!--  get set  barber availability php script here -->
<?php
include('action_barber.php')
?>
<!--  html code for set availability booking page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Barber Sets Availability Booking</title>
<link rel="stylesheet" type="text/css" href="../css/barbers.css">
</head>
<body>
<div class="barber_photo">
<img src="../images/set_availability.png" alt="barber set availability logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>Barber Sets Availability Bookings</h1>
</div>
<div class="paragraph">
<p id="p1">You could only set availability when your account have been verified by administrators.<br>
<br>Please provide username, free slot date, location  to set availability.</p>
</div>
<br>
<form method="POST" action="barber_set_availability.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="set_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_barber_email">

<label for="Location">Enter your location: *</label>
    <input type="text" name="get_location">

<label for="Free Slot">Enter your free date and time: *</label>
    <input type="datetime-local" name="get_datetime">

    <input type="submit" id="set_btn" name="set_availability_btn" value="Set Availability">
   <input type="reset" id="reset_btn" value="Clear Input">
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Barber Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='barber_control_ui.php'">Return to Barber Control Panel</button>

</body>
</html>