<!--  get confirm barber registration php script here -->
<?php
include ('action_administrator.php')
?>
<!--  html code for confirm barber page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Confirm Barbers Registration</title>
<link rel="stylesheet" type="text/css" href="../css/administrators.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/confirm_barber.png" alt="confirm barber" width="200" height="200">
</div>
<div class="heading_header">
<h1>Confirming Barbers Registration</h1>
</div>
<div class="paragraph">
<p id="p1">You could only confirm a new barber once their registration is done.<br>
Please provide barbers username to confirm their status.</p>
</div>
<form method="POST" action="administrator_confirm_barber.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="confirm_form_container">
    <label for=" Barber Username">Enter barber username email: *</label>
    <input type="email" name="get_username">

    <button type="submit" id="confirm_barber_btn" name="confirm_barber_btn">Confirm Barbers</button>
   <button type="reset" id="reset_btn">Clear Input</button>
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to administrator control panel</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='administrator_control_ui.php'">Return to Administrator Control Panel</button>

</body>
</html>