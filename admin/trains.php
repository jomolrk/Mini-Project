

<?php
include '../connection.php';
if(isset($_POST["submit"])){
	$train_name=$_POST["name"];
	
	$first_seat=$_POST["f1"];
	
	$second_seat=$_POST["s1"];
   
	mysqli_query($conn,"INSERT INTO `train`( `name`, `first_seat`, `second_seat`) VALUES ('$train_name','$first_seat','$second_seat')");
	echo "<script language='javascript'>";
	echo 'window.location.href = "view trains.php"';
	echo "alert('train details added succefully')";
	
	echo "</script>";
	
}

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Train insert</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="../css/style_reg.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--bootstrap link-->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<a href="index1.php">
          
<span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a>
</head>
<body>
	
<!-- banner -->
	<div class="center-container">
	    <div class="main">
	        <h1 class="w3layouts_head">Train List</h1>
	           <div class="w3layouts_main_grid">
	                <form action="#" method="post" class="w3_form_post" onsubmit="return validate();">
                                         <div class="w3_agileits_main_grid w3l_main_grid">
	                          <span class="agileits_grid">
			<label>Train  Name </label>
			  <input type="text" name="name"  maxlength="50" required="">
			  

	                          </span>
                                                  <div class="w3_agileits_main_grid w3l_main_grid">
			<span class="agileits_grid">
			   <label> First-seat </label>
			      <input type="number" name="f1" maxlength="150" pattern="[0-149]{150}" required="">
			      
			</span>
		           </div>
		   <div class="w3_agileits_main_grid w3l_main_grid">
		          <span class="agileits_grid">
                                                      <label>Second-seat </label>
		                    <input type="number" name="s1" pattern="[0-149]{150}" required="">
			
		          </span>
		  </div>




		       
		<div class="w3_main_grid_right">
		<input type="submit" name="submit" value="Add Trains">
						</div>
					</div>
				</form>
			</div>


		</div>
	</div>
<script language="javascript" type="text/javascript">
function validate(){ 
     var name = document.getElementById('name').value;
     var first_seat = document.getElementById('f1').value;
     var second_seat= document.getElementById('s1').value;
     

     if (name==null || name=="" || name.length <= 2){
          alert("Full Name can't be blank"); 
          return false;
     }
     else if (first_seat==null || first_seat==""){
          alert(" insert the seat number properly"); 
          return false; 
     }
     
     else if (second_seat==null || second_seat==""){ 
          alert("insert the seat number properly"); 
          return false; 
     }
     return true;
} 
</script> 
<!-- //footer -->
</body>
</html>
