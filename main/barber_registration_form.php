<!--  get barber registration php script here -->
<?php
include('action_barber.php')
?>
<!--  html code for barber registration here -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Automated Booking System - Barber Registration Form</title>
<link rel="stylesheet" type="text/css" href="../css/barbers.css">
</head>
<body>
<div class="barber_photo">
<img src="../images/barber_register.png" alt="barber registration form logo" width="200" height="200">
</div>
<div class="heading_header">
<h1>Create New Barber Accounts</h1>
</div>
<div class="paragraph">
<p id="p1">Please register your new account below with * marks are mandatory field.</p>
</div>
<div class="paragraph2">
<p id="p2">Barber Registration Form</p>
</div>
        <form method="POST" action="barber_registration_form.php">
        <!--  display error message here -->
        <?php
        include('errors.php');
        ?>
                            <fieldset>
<legend>Personal Information:</legend>
<div class="register_form_container">
 <label for="First Name">Enter your first name: *<input type="text" name="get_first_name" value="<?php echo $get_username; ?>"></label>

<label for="Last Name">Enter your last name: *<input type="text" name="get_last_name" value="<?php echo $get_last_name; ?>"></label>

<label for="Location">Enter your location: *<input type="text" name="get_location" value="<?php echo $get_location; ?>"></label>

<label for="Phone Number">Enter your phone number: *<input type="text" name="get_phone" value="<?php $get_phone; ?>"></label>

<label for="Email Address">Enter your email address: *<input type="email" name="get_barber_email" value="<?php $get_barber_email; ?>"></label>

<label for="Create New Password">Create new password: *<input type="password" name="get_password"></label>

<label for="reenter password">Reenter new password: *<input type="password" name="get_reEnter_password"></label>

<button type="submit" id="create_barber_btn" name="create_barber_btn">Create Account</button>
</div>
</fieldset>
</form>

  <div class="paragraph3">
  <p id="p3"> Not ready yet? Click return to login home.</p>
    <button type="button" id="go_back_btn" onclick="window.location.href='home.php'">Return to Login Home</button>
</div>
</body>
</html>