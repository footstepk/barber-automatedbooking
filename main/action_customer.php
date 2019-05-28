<?php 
	session_start();

	// variable declaration
		$errors = array(); 
	$_SESSION['success'] = "";
$DB_SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "";

	// connect to database
$connection = mysqli_connect($DB_SERVER, $USERNAME, $PASSWORD, "booking");
	// Check connection
	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
	
	// Get user login
	if (isset($_POST["login_btn"])) {
	    $username = mysqli_real_escape_string($connection, $_POST["get_username"]);
	    $password = mysqli_real_escape_string($connection, $_POST["get_password"]);
	    
	    if (empty($username)) {
	        array_push($errors, "Username is required");
	    }
	        
	    if (empty($password)) {
	        array_push($errors, "Password is required");
	    }
	        
	    // if no error, proceed user to login to page.
	    if (count($errors) == 0) {
	        // Next we need to get the password from the user in the database,
	        //that has the same username as what the user typed in,
	        //and then we need to de-hash it and check if it matches the password the user typed into the login form.
	        // We will connect to the database using prepared statements which work by us sending SQL to the database first,
	        //and then later we fill in the placeholders by sending the users data.
	        $sql = "SELECT * FROM customers WHERE customer_email = ? AND password = ?;";
	        // Here we initialize a new statement using the connection from the get_customer.php file.
	        $stmt = mysqli_stmt_init($connection);
	        // Then we prepare our SQL statement AND check if there are any errors with it.
	        if (!mysqli_stmt_prepare($stmt, $sql)) {
	            // If there is an error we send the user back to the login home page.
	            header("Location: customer_login.php");
	            exit();
	        } else {
	            // If there is no error then we continue the script!
	            // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
	            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
	            // Then we execute the prepared statement and send it to the database!
	            mysqli_stmt_execute($stmt);
	            // And we get the result from the statement.
	            $result = mysqli_stmt_get_result($stmt);
	            // Then we store the result into a variable.
	            if ($row = mysqli_fetch_assoc($result)) {
	                // Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
	                $password_check = password_verify($password, $row['password']);
	                // If they don't match then we create an error message!
	                if ($password_check == false) {
	                    // If there is an error we send the user back to the signup page.
	                    header("Location: customer_login.php");
	                    exit();
	                    // Then if they DO match, then we know it is the correct user that is trying to log in!
	                    	                } else if ($password_check == true) {
	                    // Next we need to create session variables based on the users information from the database.
	                    //If these session variables exist, then the website will know that the user is logged in.
	                    	                    // Now that we have the database data, we need to store them in session variables which are a type of variables that we can use on all pages that has a session running in it.
	                    // This means we NEED to start a session HERE to be able to create the variables!
	                    session_start();
	                    // And NOW we create the session variables.
	                    $_SESSION['username'] = $row['customer_email'];
	                    $_SESSION['password'] = $row['password'];
	                    // Now the user is registered as logged in and we can now take them back to the front page! :)
	                    	                    $_SESSION['success'] = "You are now logged in";
	                    	                    
	                    header("Location: customer_control_ui.php");
	                    exit();
	                }
	            }
	            else {
	                header("Location: customer_login.php");
	                exit();
	            }
	        }
	    }
	}

	// Register customer user.
	if (isset($_POST['create_customer_btn'])) {
	    // receive all input values from the form
	    $first = mysqli_real_escape_string($connection, $_POST['get_first_name']);
	    $last = mysqli_real_escape_string($connection, $_POST['get_last_name']);
	    $phone = mysqli_real_escape_string($connection, $_POST['get_phone']);
	    $customer_email = mysqli_real_escape_string($connection, $_POST['get_customer_email']);
	    $password = mysqli_real_escape_string($connection, $_POST['get_password']);
	    $reEnter_password = mysqli_real_escape_string($connection, $_POST['get_reEnter_password']);
	    
	    // form validation: ensure that the form is correctly filled
	    if (empty($first)) {
	        array_push($errors, "first name field must not be blank");
	    } else {
	        $first = test_input($_POST["get_first_name"]);
	        // check if first name only contains letters and whitespace
	        if (!preg_match("/^[a-zA-Z ]*$/", $first)) {
	            array_push($errors, "first name only letter case allowed!");
	        }
	    }
	    
	    if (empty($last)) {
	        array_push($errors, "last name field must not be blank");
	    } else {
	        $last = test_input($_POST["get_last_name"]);
	        // check if last name only contains letters and whitespace
	        if (!preg_match("/^[a-zA-Z ]*$/", $last)) {
	            array_push($errors, "last name only letter case allowed!");
	        }
	    }
	    
	    if (empty($phone)) {
	        array_push($errors, "phone number field must not be blank");
	    } else {
	        $phone = test_input($_POST["get_phone"]);
	        // check if phone number only contains numeric formats.
	        if (!preg_match("/^[0-9]*$/", $phone)) {
	            array_push($errors, "Only numeric formats allowed i.e 123456789");
	        }
	    }
	    
	    if (empty($customer_email)) {
	        array_push($errors, "Email is required");
	    } else {
	        $customer_email = test_input($_POST["get_customer_email"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }
	    
	    if (empty($password)) {
	        array_push($errors, "Password is required");
	    } else {
	        $password = test_input($_POST["get_password"]);
	        // check if password length less and greater than 8 and 12.
	        if($password >= 8 && $password <= 12) {
	            $password = test_input($_POST["get_password"]);
	            	        }
	        // check if password only contains upper, number and special characters.
	        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $password)) {
	            array_push($errors, "Must at least upper case, number and special character i.e. !,.#!{A  b 1234 allowed");
	        }
	    }
	    
	    if (empty($reEnter_password)) {
	        array_push($errors, "reenter password field must not be blank");
	    } else {
	        $reEnter_password = test_input($_POST["get_reEnter_password"]);
	        // check if both password are match.
	        if($password !== $reEnter_password) {
	            array_push($errors, "Both password are not identical!");
	        }
	    }
	    
	    // register user if there are no errors in the form
	    if (count($errors) == 0) {
	        // Next thing we do is to prepare the SQL statement that will insert the users info into the database.
	        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
	        $sql = "INSERT INTO customers (first_name, last_name, phone, customer_email, password) VALUES (?, ?, ?, ?, ?);";
	        // Here we initialize a new statement using the connection from the action_customer.php file.
	        $stmt = mysqli_stmt_init($connection);
	        // Then we prepare our SQL statement AND check if there are any errors with it.
	        if (!mysqli_stmt_prepare($stmt, $sql)) {
	            // If there is an error we send the user back to the customer registration  page.
	            header("Location: customer_registration_form.php");
	            exit();
	        } else {
	            // If there is no error then we continue the script!
	            // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable,
	            // in case anyone gets access to our database without permission!
	            // The hashing method is the LATEST version and will always will be since it updates automatically.
	            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	            
	            // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
	            mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $phone, $customer_email, $hashedPassword);
	            // Then we execute the prepared statement and send it to the database!
	            // This means the user is now registered! :)
	            mysqli_stmt_execute($stmt);
	            
	            // Lastly we send the user to the customer user interface feature page with a success message!
	            $_SESSION['get_customer_email'] = $customer_email;
	            $_SESSION['success'] = "You are now registered and will be redirect to logged in";
	            header("Location: customer_control_ui.php");
	            exit();
	            
	        }
	    }
	}

	//Customer make booking if any free time..
	if (isset($_POST['make_booking_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $username = test_input($_POST['get_username']);
	    
	    if (empty($username)) {
	        array_push($errors, "username or id is required");
	    } else {
	        $username = test_input($_POST['get_username']);
	        // check if username or id is valid.
	        //	        if (!preg_match("/^[0-9]*$/", $username)) {
	        //	            array_push($errors, "Invalid username or id format, at least numeric numbers");
	        //	        }
	    }
	    
	    // Proceed to make  booking if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql select query from database to view customer booking from barber confirmation booking.
	        $sql_select = "SELECT b.confirm_booking FROM barbers b,customers c WHERE b.$username = c.$username;";
	        $result = mysqli_query($connection, $sql_select);
	        
	        if (mysqli_num_rows($result) > 0) {
	            // output data of each row
	            while($row = mysqli_fetch_assoc($result)) {
	                echo "confirmation booking from barber: " . $row["confirm_booking"] . "<br>";
	                header("Location: customer_make_booking.php");
	                exit();
	            }
	        } else {
	            array_push($errors, "No booking make yet by customer");
	            header("Location: customer_control_ui.php");
	            exit();
	        }
	    }
	    
	    // Lastly we send the customer to the customer user interface feature page with a success message!
	    $_SESSION['success'] = "You submitted your booking made to barber's confirmation booking";
	    header('Location: customer_control_ui.php');
	    exit();
	}
	
	// View customer booking.
	if (isset($_POST['view_booking_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $username = test_input($_POST['get_username']);
	    
	    if (empty($username)) {
	        array_push($errors, "username or id is required");
	    } else {
	        $username = test_input($_POST['get_username']);
	        // check if username or id is valid.
//	        if (!preg_match("/^[0-9]*$/", $username)) {
//	            array_push($errors, "Invalid username or id format, at least numeric numbers");
//	        }
	    }
	    
	    // View booking if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql select query from database to view customer booking.
	        $sql_select = "SELECT c.first_name, c.last_name, c.current_booked, b.first_name, b.last_name FROM barbers b,customers c WHERE c.$username = b.$username;";
	        $result = mysqli_query($connection, $sql_select);
	        
	        if (mysqli_num_rows($result) > 0) {
	            // output data of each row
	            while($row = mysqli_fetch_assoc($result)) {
	                echo "first name: " . $row["first_name"]. " - last name: " . $row["last_name"]. " " . $row["current_booked"]. " " . "<br>" . "Barber booked: " . $row["first_name"]. " - last name: ". $row["last_name"]. "<br>";
	                header("Location: customer_view_booking.php");
	                exit();
	            }
	        } else {
	            array_push($errors, "No booking make yet by customer");
	            header("Location: customer_control_ui.php");
	            exit();
	        }
	    }
	    
	    // Lastly we send the customer to the customer user interface feature page with a success message!
	    $_SESSION['success'] = "Here is your booking views made by customer";
	    header('Location: customer_control_ui.php');
	    exit();
	}
	
	// Customer make complaint.
	if (isset($_POST['make_complaint_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $mail = test_input($_POST["get_username"]);
	    $complaint = test_input($_POST["comment"]);
	    
	    if (empty($mail)) {
	        array_push($errors, "Email is required");
	    } else {
	        $mail = test_input($_POST["get_username"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }
	    
	    if (empty($complaint)) {
	        array_push($errors, "Please write your comment  is required");
	    }

	    // Proceed to make complaint if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql update query to database to make complaint, ensure  a valid users.
	        $sql_update = "UPDATE customers SET comment = '$complaint' WHERE customer_email = '$mail';";
	        if ($connection->query($sql_update) === TRUE) {
	            echo "The complaint and comment with username $mail has been made.";
	            header("Location customer_control_ui.php");
	        } else {
	            // send customer back to customer_make_complaint.php page if errored!
	            array_push($errors, "Errored, cannot make comment or complaint $mail status, try again!") . $connection->error;
	            header('Location: customer_make_complaint.php');
	        }
	    }
	    // Lastly we send the customer to the customer user interface feature page with a success message!
	    $_SESSION['success'] = "The comment has been made to the database";
	    header('Location: customer_control_ui.php');
	}
	
	// Get retrieve forgotten login instruction.
	if (isset($_POST['forgot_btn'])) {
	    // receive email input values from the form.
	    $email = test_input($_POST['get_username']);
	    
	    if (empty($email)) {
	        array_push($errors, "Email is required");
	    } else {
	        $email = test_input($_POST["get_username"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }

	    // get user login details if there are no errors in the form
	    if (count($errors) == 0) {
	        // Next thing we do is to prepare the SQL statement that will insert the users email reset  into the database.
	        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
	        // NOTE: the default of administrator email is admin@admin.ie where administrator will access the request reset files.
	        $sql = "UPDATE administrators SET request_reset_files = ? WHERE admin_email = 'admin@admin.ie';";
	        // Here we initialize a new statement using the connection from the action_customer.php file.
	        $stmt = mysqli_stmt_init($connection);
	        // Then we prepare our SQL statement AND check if there are any errors with it.
	        if (!mysqli_stmt_prepare($stmt, $sql)) {
	            // If there is an error we send the user back to the forgotten form page.
	            header("Location: user_forgot_form.php");
	            exit();
	        } else {
	            // If there is no error then we continue the script!
	            // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
	            mysqli_stmt_bind_param($stmt, "s", $email);
	            // Then we execute the prepared statement and send it to the database!
	            // This means the user will receive reset login instruction! :)
	            mysqli_stmt_execute($stmt);
	            
	            // Lastly we send the user back to the login home page with a success message!
	            $_SESSION['get_customer_email'] = $email;
	            $_SESSION['success'] = "You will shortly received an email to reset your login details.";
	            header("Location: customer_login.php");
	            exit();
	            
	        }
	    }
	}

	// Then we close the prepared statement and the database connection!
	mysqli_stmt_close($stmt);
	mysqli_close($connection);

?>