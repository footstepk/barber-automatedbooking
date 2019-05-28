<!--  check if user had loged-in to the system -->
<?php 
	session_start(); 

	if (!isset($_SESSION['get_username'])) {
		$_SESSION['msg'] = "You must log in first";
		header("Location: administrator_login.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['get_username']);
		header("Location: administrator_login.php");
	}
?>
<!--  html code for administrator user interface page. -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Administrator's Control Panel</title>
<link rel="stylesheet" type="text/css" href="../css/administrators.css">
</head>
<body>
<div class="administrator_photo">
<img src="../images/admin_control_ui.png" alt="administrator control panel logo" width="150" height="150">
</div>
<div class ="heading_header">
<h1>Administrator's Home</h1>
</div>
<div class="paragraph">
<p id="p1">Administrator can manage user account here.</p>
</div>
<div class="paragraph2">
<p id="p2">Administrator Account Features</p>
</div>
	<div class="content">
		<!-- notification message -->
		<?php
		if (isset($_SESSION['success'])) : ?>
			<div class="error_success">

					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>

			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<?php if (isset($_SESSION['get_username'])) : ?>
			<p id="p4">Welcome to Administrator Control Panel<strong><?php echo $_SESSION['get_username']; ?></strong></p>
			<p id="p5"><a href="administrator_control_ui.php?logout='1'" style="color: red;">logout</a> </p>
</div>
<dl>	
<dt><button type="submit" id="confirm_barber_btn" name="confirm_barber_btn" onclick="window.location.href='administrator_confirm_barber.php'">Confirm Barber Accounts</button></dt><br>
    <br>
<dd> - Confirm a new barber account</dd>
<dt><button type="submit" id="view_booking_btn" name="view_booking_btn" onclick="window.location.href='administrator_view_booking.php'">View Booking</button></dt><br>
    <br>
<dd> - View barbers and customers booking activities</dd>
<dt><button type="submit" id="view_complaint_btn" name="view_complaint_btn" onclick="window.location.href='administrator_view_complaint.php'">View Complaint</button></dt><br>
    <br>
<dd> - View customer's complain and deal it</dd>
<dt><button type="submit" id="delete_btn" name="delete_btn" onclick="window.location.href='administrator_delete.php'">Delete User Accounts</button></dt><br>
    <br>
<dd> - Delete barbers or customers account from system</dd>
</dl>
	<?php endif ?>
	
</body>
</html>