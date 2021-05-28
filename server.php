<?php

if (!isset($_SESSION)) session_start();
// initializing variables
$email    = "";
$errors = array();
// connect to the database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'aventus-160936_project-p5');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


if (isset($_POST['reg_user'])) {
  if (isset($_POST['login_user'])){ unset($_POST['login_user']);}

  echo "debug: reg_user executed";

  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customers WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO customers (email, password)
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}



if (isset($_POST['login_user'])) {
	global $db, $email, $error, $password;
  if (isset($_POST['reg_user'])){ unset($_POST['reg_user']);}

  echo "debug: login_user executed";
	// grap form values
  $email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
  $_SESSION['user_type'] = 'regular user';
	// make sure form is filled properly
  if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM customers WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
      //check if user is admin
      echo $email;

      $queryadmin = "SELECT * FROM customers WHERE email='$email' AND internalNotes = 'admin'";
      $resultsadmin = mysqli_query($db, $queryadmin);
      if (mysqli_num_rows($resultsadmin)>=1) {
            $_SESSION['user_type'] = 'admin';
            echo "admintest";
      } else {
          $_SESSION['user_type'] = 'regular user';
      }

      $logged_in_user = mysqli_fetch_assoc($results);
      $_SESSION['email'] = $logged_in_user["email"];;
      //redirect
      header("Location: index.php");
      die();

		}else {
			array_push($errors, "Wrong email/password combination");
		}
	}
}

if (isset($_GET['logout'])){
  session_unset();
  $_POST = array();
  unset($_POST);
}

?>
