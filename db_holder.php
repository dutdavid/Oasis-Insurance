<?php

$con = mysqli_connect('127.0.0.1', 'root', '');

if(!$con)
{
  echo 'not connected to server';
}
if(!mysqli_select_db($con,'oasis_insurance'))
{
  echo'database not slected';
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$insurance_name = $_POST['insurance_name'];
$policy_number = $_POST['policy_number'];
$duration = $_POST['duration'];

$sql = "INSERT INTO policy (first_name,last_name,insurance_name,policy_number,duration) VALUES ('$first_name','$last_name','$insurance_name','$policy_number','$duration')";

if(!mysqli_query($con,$sql))
{
  echo 'Not Inserted';
}
else
{
  echo 'Inserted';
}

header("refresh:2; url=policy_holder.php");

?>




