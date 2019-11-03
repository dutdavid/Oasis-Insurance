<?php
include("dbconnection.php");
$id=$_REQUEST['id'];
echo $id;
$delete_query="update policy set status ='Approved' WHERE ID='$id'";
$run=mysqli_query($con, $delete_query);

echo 2;
?>