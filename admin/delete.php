<?php

include("includes/db_connect.php");
$delete_ID=$_GET['del'];
$delete_query="delete  from insurance WHERE ID='$delete_ID'";
$run=mysqli_query($conn,$delete_query);
if($run)
{

    echo "<script>window.open('view_insurance.php?deleted=user has been deleted','_self')</script>";
}

?>