<?php
	$conn = 'localhost';
	$username = "root";
	$password = "";
	$db = "train";

	$conn =  mysqli_connect($conn,$username,$password,$db);
	
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
?>
