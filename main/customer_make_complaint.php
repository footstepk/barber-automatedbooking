<!--  get customer make complaint php script here -->
<?php
include('action_customer.php')
?>
<!--  html code for make complaint page -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Welcome to Automated Booking System - Customerr Make Complaints</title>
<link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
<div class="customer_photo">
<img src="../images/make_complaint.png" alt="customer make complaint logo" width="100" height="100">
</div>
<div class="heading_header">
<h1>Customer Make Complaints</h1>
</div>
<div class="paragraph">
<p id="p1">You can write comments or complaints  about the services that you received to administrator and all comments will be dealt confidentially.
<br>Please provide user's username to make comment.</p>
</div>
<form method="POST" action="customer_make_complaint.php">
<!--  display error message here -->
<?php
include('errors.php');
?>
<div class="make_complaint_form_container">
    <label for="Username Email">Enter Username email: *</label>
    <input type="email" name="get_username">

<textarea rows="10" cols="160" name="comment">
Enter your comment here</textarea><br><br>

    <input type="submit" id="make_complaint_btn" name="make_complaint_btn" value="Make Complaint">
    
   <input type="reset" id="reset_btn" value="Clear Input">
   </div>
   </form>
   <div class="paragraph3">
   <p id="p3">Click return to Customer Control Panel.</p>
   </div> 
<button type="button" id="go_back_btn" onclick="window.location.href='customer_control_ui.php'">Return to Customerr Control Panel</button>
</body>
</html>