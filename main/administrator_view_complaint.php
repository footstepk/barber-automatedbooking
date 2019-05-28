<!--  get confirm barber registration php script here -->
<?php
include('action_administrator.php')
?>
<!--  html code for view customer complaint page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - View Customer Complaints</title>
<link rel="stylesheet" type="text/css" href="../css/administrators.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/view_complaint.png" alt="view customer complaint logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>View Customer Complaints</h1>
</div>
<div class="paragraph">
<p id="p1">You could only view an existing customer complaints.<br>
<br>
<br>Please provide user's username to view their complaints.</p>
</div>
<form method="POST" action="administrator_view_complaint.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="view_complaint_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_username">

    <button type="submit" id="view_complaint_btn" name="view_complaint_btn">View Complaint</button>
   <button type="reset" id="reset_btn">Clear Input</button>
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Administrator Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='administrator_control_ui.php'">Return to Administrator Control Panel</button>

</body>
</html>