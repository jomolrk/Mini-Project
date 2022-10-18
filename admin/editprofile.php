<?php
session_start();


require('connection.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:../login.php");
		
	}


if(!isset($_SESSION["submit"]))
header("location:../login.php");

$name=$_SESSION['reg_name'];
$mail=$_POST['log_email'];
$gender=$_POST['reg_gender'];
$dob=$_POST['reg_dob'];
$mobile=$_POST['reg_phone'];
$idcard=$_POST['reg_adhar'];




$sql="UPDATE tbl_login AND tbl_register SET reg_name='$name,log_email='$mail',reg_gender='$gender',reg_dob='$dob',reg_phone='$mobile',reg_adhar='$idcard' WHERE reg_name='$name'";
$result=mysqli_query($conn,$sql);


$_SESSION['error']==4;

header('location:user.php');

?>



