<?php
session_start();


require('../connection.php');



if(!isset($_SESSION["submit"]))


$name=$_SESSION['name'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$mobile=$_POST['phno'];
$idcard=$_POST['ino'];




$sql="UPDATE tbl_login AND tbl_register SET reg_name='$name,reg_gender='$gender',reg_dob='$dob',reg_phone='$mobile',reg_adhar='$idcard' WHERE reg_name='Admin'";
$result=mysqli_query($conn,$sql);


$_SESSION['error']==4;

header('location:user.php');

?>

<!DOCTYPE html>
<html>
<head>

	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			//alert($(window).width());
			var x=(($(window).width())-924)/2;
			//alert(x);
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>

<body style="background-image: url(images/regim.jpg);">
	
	<div class="wrap">
		<!-- Header -->
		<div class="header">
			<div style="float:left;width:150px;">
				<img src="images/avatar-1.png"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
			
			</div>
			<div id="heading">
				<a href="index1.php" style="color:orangered"></a>
			</div>
			</div>
		</div>
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index1.php" >Back to Admin dashboard </a>
				
			</div>
		</div>
		
		<div class="span12 pass3 " style="display:none;">
		<div class="span8 well">
			<table style="width:100%;">
			<tr>
				<td><span style="font-weight:bold;font-size:25px;">Profile</span>

			<tr/>
			
			<tr>
				<td>
				<span style="width:35%;"><a href="../edit profile.php">edit profile</span>
				<form action="editprofile.php" method="post" enctype="multipart/form-data">
					<div class="span6" style="float:left;width:80%;">
					<table class="table">
					<tr><td >Fullname : </td> <td style="text-transform:capitalize;"><?php echo $row['name']; ?></td></tr>
			
					<tr><td>E-Mail : </td> <td><?php echo $row['email'];?></td></tr>
					<tr><td>Dob : </td> <td><?php echo $row['dob']; ?></td></tr>
					<tr><td> Gender :</td> <td><?php echo $row['gender'];?></td></tr>
					<tr><td>ID Cardno: </td> <td><?php echo $row['ino']; ?></td></tr>
					<tr><td>Mobile No : </td> <td><?php echo $row['phno'];?></td></tr>
					

					<tr> <td><input type="submit"  class="btn btn-info" value="Edit profile" ></td></tr>
				
					</table>
					</div>
					</form>
				</td>
			</tr>
			</table>
		</div>
		</div>
	
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy;all copyright reserved</p>	
			</div>
			<div style="float:right;">
			
			</div>
		</div>
		</footer>
	
	</div>
	</html>





