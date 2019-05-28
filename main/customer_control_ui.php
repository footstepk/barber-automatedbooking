<!--  check if user had loged-in to the system -->
<?php 
	session_start(); 

	if (!isset($_SESSION['get_username'])) {
		$_SESSION['msg'] = "You must log in first";
		header("Location: customer_login.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['get_username']);
		header("Location: customer_login.php");
	}
?>
<!--  html code for customer user interface here -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Customers Control Panel</title>
<link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
<div class="customer_photo">
<img src="../images/customer_control_ui.png" alt="customer control panel logo" width="150" height="150">
</div>
<div class="heading_header">
<h1>Customer's Home</h1>
</div>
<div class="paragraph">
<p id="p1">Customers can manage your account here.</p>
</div>
<div class="paragraph2">
<p><em>Customer's Account Features</em></p>
</div>
	<div class="content">
		<!-- notification message -->
		<?php
		if (isset($_SESSION['success'])) : ?>
			<div class="error_success">
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
</div>			
		<?php endif ?>
		<!-- logged in user information -->
		<?php if (isset($_SESSION['get_username'])) : ?>
			<p id="p4">Welcome to Customer Control Panel<strong><?php echo $_SESSION['get_username']; ?></strong></p>
			<p id="p5"><a href="customer_control_ui.php?logout='1'" style="color: red;">logout</a> </p>
</div>
<dl>
<dt><button type="submit" id="make_booking_btn" name="make_booking_btn" onclick="window.location.href='customer_make_booking.php'">Make booking</button></dt>
<dd> - Make a new booking</dd>
<dt><button type="submit" id="view_booking_btn" name="view_booking_btn" onclick="window.location.href='customer_view_booking.php'">View Booking</button></dt>
<dd> - View current booking</dd>
<dt><button type="submit" id="make_complaint_btn" name="make_complaint_btn" onclick="window.location.href='customer_make_complaint.php'">Make Complaint</button></dt>
<dd> - Make a complaint</dd>
</dl>

	<?php endif ?>

</body>
</html>