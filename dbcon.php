<?php
	#session_start();
	$username = "root";
	$password = "0506";
	$server = "localhost";
	$dbname = "food";
	//$conn = new mysqli($server,$username,$password);
	//$conn = mysqli_connect($server, $username, $password);
	$conn = mysqli_connect($server,$username,$password,$dbname);
	if(!$conn) {
		die("connection failed" . mysqli_connect_error());
	}
	else {
		#echo "yo";
		return true;

	}
?>