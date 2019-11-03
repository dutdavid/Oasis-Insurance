<?php
	require_once "includes/db_connect.php";

	if(isset($_POST["register"])){
		$insurance_name = mysqli_real_escape_string($conn, $_POST["insurance_name"]);
		$Insurance_code = mysqli_real_escape_string($conn, $_POST["Insurance_code"]);
			
	$insurance_insert = "INSERT INTO insurance (insurance_name, Insurance_code) VALUES ('$insurance_name', '$Insurance_code')";

		if ($conn->query($insurance_insert) === TRUE) {
			header("Location: insurance.php");
			exit();
		} else {
			echo "Error: " . $insurance_insert . "<br />" . $conn->error;
		}
		$conn->close();
	}

?>

