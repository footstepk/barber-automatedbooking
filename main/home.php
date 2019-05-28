<!--  This is the main home for user to choose login or create a new account -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Home</title>
<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
<div class="home_photo">
<img src="../images/home.png" alt="Automated Booking System Logo" width="150" height="150">
</div>
<div class="heading_header">
<h1>Welcome to Automated Booking System For Barbers, Customers and Administrators</h1>
</div>
<div class="paragraph">
<p id="p1">You can login to the booking system or create a new account.</p>
</div>
<div class="heading2">
<h3>If you have an account simply choose your user type to get login below:</h3>
</div>
<!--  If has an account simply choose user type to get login here -->
<div class="login_user_container">
<dl>
<dt><button type="submit" id="administrator_login_btn" onclick="window.location.href='administrator_login.php'">Administrator Login</button></dt>
<dd> - For Administrator Login</dd>

<dt><button type="submit" id="barber_login_btn" onclick="window.location.href='barber_login.php'">Barber Login</button></dt>
<dd> - For Barber Login</dd>

<dt><button type="submit" id="customer_login_btn" onclick="window.location.href='customer_login.php'">Customer Login</button></dt>
<dd> - For Customer Login</dd>
</dl>
</div>

<!--  If hasn't got an account yet, get register here -->
<div class="paragraph2">
<p id="p2">Hasn't got account yet?? Click on below to choose your user types to create a new account!</p>
</div>
<button type="submit" id="new_barber_btn" onclick="window.location.href='barber_registration_form.php'">Create New Barber Account</button>
<button type="submit" id="new_customer_btn" onclick="window.location.href='customer_registration_form.php'">Create New Customer Account</button>

</body>
</html>