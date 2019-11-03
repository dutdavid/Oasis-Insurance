<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$policy_number = $_POST['policy_number'];

if (!empty($first_name) || !empty($last_name) || !empty($user_name) || !empty($password) || !empty($policy_number)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "oasis_insurance";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT user_name From client Where user_name = ? Limit 1";
     $INSERT = "INSERT Into client (first_name, last_name, user_name, password, policy_number) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $user_name);
     $stmt->execute();
     $stmt->bind_result($user_name);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssi", $first_name, $last_name, $user_name, $password, $policy_number);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>