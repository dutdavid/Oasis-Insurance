<?php

session_start();
// initializing variables
$last_name = "";
$user_name    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'oasis_insurance');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $policy_number = mysqli_real_escape_string($db, $_POST['policy_number']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first_name)) { array_push($errors, "first name is required"); }
  if (empty($last_name)) { array_push($errors, "last name is required"); }
  if (empty($user_name)) { array_push($errors, "User Name is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
if (empty($policy_number)) { array_push($errors, "Policy Number is required"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $client_check_query = "SELECT * FROM clients WHERE last_name='$last_name' OR user_name='$user_name' LIMIT 1";
  $result = mysqli_query($db, $client_check_query);
  $client = mysqli_fetch_assoc($result);
  
  if ($client) { // if user exists
    if ($client['last_name'] === $last_name) {
      array_push($errors, "user already exists");
    }

    if ($client['user_name'] === $user_name) {
      array_push($errors, "Client already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO client (first_name, last_name, user_name, password, policy_number) 
  			  VALUES('$first_name', '$last_name', '$user_name', '$password', '$policy_number')";
  	mysqli_query($db, $query);
  	$_SESSION['user_name'] = $user_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER

if (isset($_POST['submit'])) {
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user_name)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM client WHERE user_name='$user_name' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['user_name'] = $user_name;
      $_SESSION['success'] = "You are now logged in";
      header('location: dashboard.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>