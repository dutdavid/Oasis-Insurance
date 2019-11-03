<?php
// initializing variables
$first_name = "";
$last_name    = "";
$insurance_name    = "";
$policy_number    = "";
$duration    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'oasis_insurance');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $insurance_name = mysqli_real_escape_string($db, $_POST['insurance_name']);
  $policy_number = mysqli_real_escape_string($db, $_POST['policy_number']);
  $duration = mysqli_real_escape_string($db, $_POST['duration']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first_name)) { array_push($errors, "first name is required"); }
  if (empty($last_name)) { array_push($errors, "last name is required"); }
  if (empty($insurance_name)) { array_push($errors, "insurance_name is required"); }
  if (empty($policy_number)) { array_push($errors, "policy_number is required"); }
  if (empty($duration)) { array_push($errors, "duration is required"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $policy_check_query = "SELECT * FROM policy WHERE last_name='$last_name' LIMIT 1";
  $result = mysqli_query($db, $policy_check_query);
  $policy = mysqli_fetch_assoc($result);
 
 $query = "INSERT INTO policy (first_name, last_name, insurance_name, policy_number, duration) VALUES ('$first_name', '$last_name', '$insurance_name', '$policy_number', '$duration')";
  	mysqli_query($db, $query);
  	$_SESSION['user_name'] = $user_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: policy_holder.php');
  }
}

?>
