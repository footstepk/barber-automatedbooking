<?php 
	session_start(); 

	if (!isset($_SESSION['get_username'])) {
		$_SESSION['msg'] = "You must log in first";
		header("Location: barber_login.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['get_username']);
		header("Location: barber_login.php");
	}
?>
<!--  html code for barber user interface page. -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Barbers Control Panel</title>
<link rel="stylesheet" type="text/css" href="../css/barbers.css">
</head>
<body>
<div class="barber_photo">
<img src="../images/barber_control_ui.png" alt="barber control panel logo" width="160" height="160">
</div>
<div class="heading_header">
<h1>Barber's Home</h1>
</div>
<div class="paragraph">
<p id="p1">Barbers can manage account here.</p>
</div>
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
			<p id="p4">Welcome to Barber Control Panel<strong><?php echo $_SESSION['get_username']; ?></strong></p>
			<p id="p5"><a href="barber_control_ui.php?logout='1'" style="color: red;">logout</a> </p>
			
<div class="paragraph2">
<p id="p2"><em>Barber's Account Features</em></p>
</div>
<dl>
<dt><button type="submit" id="set_btn" name="set_availability_btn" onclick="window.location.href='barber_set_availability.php'">Set Availability</button></dt>
<dd> - Set availability status and location</dd>
<dt><button type="submit" id="view_booking_btn" name="view_booking_btn" onclick="window.location.href='barber_view_booking.php'">View Booking</button></dt>
<dd> - View customer booking</dd>
<dt><button type="submit" id="confirm_booking_btn" name="confirm_booking_btn" onclick="window.location.href='barber_confirm_booking.php'">Confirm Booking</button></dt>
<dd> - Confirm customer booking</dd>
</dl>
<?php endif ?>

</body>
</html>