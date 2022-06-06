<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database  = "quizzer";

	$conn = mysqli_connect($host, $username, $password, $database);
	if ($conn) {
		// code...
		mysqli_select_db($conn, $database);
		// echo "Connected";
	} else {
		// code...
		die("Error: <br>".mysqli_connect_error(). "<br>");
	}
?>