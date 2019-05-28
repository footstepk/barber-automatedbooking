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
	echo "Connected successfully"; // we could ignore this echo statement here!

	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	// Get administrator user login (THE DEFAULTUSERNAME admin@admin.ie)
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
	        $sql = "SELECT * FROM administrators WHERE admin_email = ? AND password = ?;";
	        // Here we initialize a new statement using the connection from the action_administrator.php file.
	        $stmt = mysqli_stmt_init($connection);
	        // Then we prepare our SQL statement AND check if there are any errors with it.
	        if (!mysqli_stmt_prepare($stmt, $sql)) {
	            // If there is an error we send the user back to the login home page.
	            header("Location: administrator_login.php");
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
	                    header("Location: administrator_login.php");
	                    exit();
	                    // Then if they DO match, then we know it is the correct user that is trying to log in!
	                } else if ($password_check == true) {
	                    // Next we need to create session variables based on the users information from the database.
	                    //If these session variables exist, then the website will know that the user is logged in.
	                    // Now that we have the database data, we need to store them in session variables which are a type of variables that we can use on all pages that has a session running in it.
	                    // This means we NEED to start a session HERE to be able to create the variables!
	                    session_start();
	                    // And NOW we create the session variables.
	                    $_SESSION['username'] = $row['admin_email'];
	                    $_SESSION['password'] = $row['password'];
	                    // Now the user is registered as logged in and we can now take them back to the front page! :)
	                    $_SESSION['success'] = "You are now logged in";
	                    
	                    header("Location: administrator_control_ui.php");
	                    exit();
	                }
	            }
	            else {
	                header("Location: administrator_login.php");
	                exit();
	            }
	        }
	    }
	}
	
	// View booking from barber and customer booking.
	if (isset($_POST['view_booking_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $username = test_input($_POST['get_username']);
	    
	    if (empty($username)) {
	        array_push($errors, "username or id is required");
	    } else {
	        $username = test_input($_POST['get_username']);
//	        // check if username or id is valid. 
//	        if (!preg_match("/^[0-9]*$/", $username)) {
//	            array_push($errors, "Invalid username or id format, at least numeric numbers");
//	        }
	    }
	    
	    // View booking if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql select query from database to view barber and customer bookings.
	        $sql_select = "SELECT b.first_name, b.last_name, b.appointment_date, c.first_name, c.last_name FROM barbers b,customers c WHERE b.$username = c.$username;";
	        $result = mysqli_query($connection, $sql_select);
	        
	        if (mysqli_num_rows($result) > 0) {
	            // output data of each row
	            while($row = mysqli_fetch_assoc($result)) {
	                echo "first name: " . $row["first_name"]. " - last name: " . $row["last_name"]. " " . $row["appointment_date"]. " " . "<br>" . "Customer booked: " . $row["first_name"]. " - last name: ". $row["last_name"]. "<br>";
	                header("Location: administrator_view_booking.php");
	                exit();
	            }
	        } else {
	            array_push($errors, "No booking make yet by customer");
	            header("Location: administrator_control_ui.php");
	            exit();
	        }
	    }
	    
	    // Lastly we send the administrator to the administrator user interface feature page with a success message!
	    $_SESSION['success'] = "Here is the booking views made by customer and barbers";
	    header('Location: administrator_control_ui.php');
	    exit();
	}

	// View customer complaint.
	if (isset($_POST['view_complaint_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $customer_email = test_input($_POST["customer_email"]);
	    
	    if (empty($customer_email)) {
	        array_push($errors, "Email is required");
	    } else {
	        $customer_email = test_input($_POST["customer_email"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }
	    
	    // View complaint if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql select query from database to view customer complaint.
	        $sql_select = "SELECT first_name, last_name, comment FROM customers WHERE customer_email = '$customer_email';";
	        $result = mysqli_query($connection, $sql_select);
	        
	        if (mysqli_num_rows($result) > 0) {
	            // output data of each row
	            while($row = mysqli_fetch_assoc($result)) {
	                echo "first name: " . $row["first_name"]. " - Last Name: " . $row["last_name"]. " " . $row["comment"]. "<br>";
	                header("Location administrator_view_complaint.php");
	            }
	        } else {
	            array_push($errors, "No complaint make yet by customer");
	            header("Location administrator_control_ui.php");
	        }
	    }
	    
	    // Lastly we send the administrator to the administrator user interface feature page with a success message!
	    $_SESSION['success'] = "The complaint has beenn viewed";
	    header('Location: administrator_control_ui.php');
	}
	
	// Confirm barber account.
	if (isset($_POST['confirm_barber_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $mail = test_input($_POST["username"]);
	    
	    if (empty($mail)) {
	        array_push($errors, "Email is required");
	    } else {
	        $mail = test_input($_POST["username"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }
	    
	    // confirm barber if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql update query to database to confirm a valid users.
	        $sql_update = "UPDATE barbers SET registered = true WHERE barber_email = '$mail';";
	        if ($connection->query($sql_update) === TRUE) {
	            echo "The barber with username $mail has been confirmed their status";
	            header("Location administrator_control_ui.php");
	        } else {
	            // send administrator back to administrator_delete.php page if errored!
	            array_push($errors, "Errored, cannot confirm barber $mail status, try again!") . $connection->error;
	            header('Location: administrator_confirm_barber.php');
	        }
	    }
	    // Lastly we send the administrator to the administrator user interface feature page with a success message!
	    $_SESSION['success'] = "The barber has been confirmed from database";
	    header('Location: administrator_control_ui.php');
	}
	
	// delete an account from customers and barbers.
	if (isset($_POST['delete_btn'])) {
	    // receive all input values from the form
	    // form validation: ensure that the form is correctly filled
	    $username = test_input($_POST["username"]);
	    
	    if (empty($username)) {
	        array_push($errors, "Email is required");
	    } else {
	        $username = test_input($_POST["username"]);
	        // check if e-mail address is well-formed
	        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
	            array_push($errors, "Invalid email format, at least 1 @, . ");
	        }
	    }
	    
	    // delete user if there are no errors in the form
	    if (count($errors) == 0) {
	        // write sql query to database to see a valid users.
	        $sql = "DELETE barbers, customers FROM barbers LEFT JOIN customers ON barbers.barber_email = customers.customer_email WHERE barbers.barber_email = '$username' OR customers.customer_email = '$username';";
	        if ($connection->query($sql) === TRUE) {
	            echo "Record deleted successfully";
	            header("Location administrator_control_ui.php");
	        } else {
	            // send administrator back to administrator_delete.php page.
	            array_push($errors, "Error deleting record: ") . $connection->error;
	            header("Location: administrator_delete.php");
	        }
	    }
	    // Lastly we send the administrator to the administrator user interface feature page with a success message!
	    $_SESSION['success'] = "User(s) has been deleted from database";
	    header("Location: administrator_control_ui.php");
	}
	
	
	// Then we close the prepared statement and the database connection!
	mysqli_stmt_close($stmt);
	mysqli_close($connection);
?>