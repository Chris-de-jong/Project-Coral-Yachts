<?php
include ("server.php");
include ("header.php");


// receive all input values from the form
$email = mysqli_real_escape_string($db, $_SESSION['email']);
  $query = "SELECT * FROM customers WHERE email='$email' LIMIT 1";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == 1) { // user found
    // check if user is admin or user
    $logged_in_user = mysqli_fetch_assoc($results);
    echo $logged_in_user;
  }else {
    array_push($errors, "Couldnt find email");
  }

echo $email;
echo mysqli_fetch_assoc($results);
?>


<html>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</html>
