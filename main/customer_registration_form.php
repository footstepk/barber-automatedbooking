<!--  get customer registration form php script here -->
<?php
include('action_customer.php')
?>
<!--  html code for customer registration here -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Customer Registration Form</title>
<link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
<div class="customer_photo">
<img src="../images/customer_register.png" alt="customer registration form logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>Create New Customer Accounts</h1>
</div>
<div class="paragraph">
<p id="p1">Please register your new account below with * marks are mandatory field.</p>
</div>
<div class="paragraph2">
<p id="p2">Customer Registration Form</p>
</div>
        <form method="POST" action="customer_registration_form.php">
        <!--  display error message here -->
        		<?php
        		include('errors.php');
        		?>
                            <fieldset>
<legend>Personal Information:</legend>
<div class="customer_register_form_container">
 <label  for="First Name">Enter your first name: *<input type="text" name="get_first_name" value="<?php echo $get_first_name; ?>"></label>

<label for="Last Name">Enter your last name: *<input type="text" name="get_last_name" value="<?php echo $get_last_name; ?>"></label>

<label for="Phone Number">Enter your phone number: *<input type="text" name="get_phone" value="<?php echo $get_phone; ?>"></label>

<label for="Email Address">Enter your email address: *<input type="email" name="get_customer_email" value="<?php echo $get_customer_email; ?>"></label>

<label for="Create New Password">Create new password: *<input type="password" name="get_password"></label>

<label for="reenter password">Reenter new password: *<input type="password" name="get_reEnter_password"></label>

<button type="submit" id="create_customer_btn" name="create_customer_btn">Create Account</button>
</div>
</fieldset>
</form>

  <div class="paragraph3">
  <p id="p3"> Not ready yet? Click return to login home.</p>
    <button type="button" id="go_back_btn" onclick="window.location.href='home.php'">Return to Login Home</button>
</div>
</body>
</html>