

<?php
include '../connection.php';
if(isset($_POST["submit"])){
	$start=$_POST["start"];
	
	$stop=$_POST["stop"];
	
	
   
	mysqli_query($conn,"INSERT INTO `route`( `start`, `stop`) VALUES ('$start','$stop')");
	echo "<script language='javascript'>";
	echo 'window.location.href = "/viewroutes.php"';
	echo "alert('route details added succefully')";
	
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
	        <h1 class="w3layouts_head">RouteList</h1>
	           <div class="w3layouts_main_grid">
	                <form action="#" method="post" class="w3_form_post" onsubmit="return validate();">
                                         <div class="w3_agileits_main_grid w3l_main_grid">
	                          <span class="agileits_grid">
			<label>start </label>
			  <input type="text" name="start"  maxlength="150" required="">
			  

	                          </span>
                                                  <div class="w3_agileits_main_grid w3l_main_grid">
			<span class="agileits_grid">
			   <label> stop</label>
			      <input type="text" name="stop" maxlength="150" required="">
			      
			</span>
		           </div>
		  




		       
		<div class="w3_main_grid_right">
		<input type="submit" name="submit" value="Add route">
						</div>
					</div>
				</form>
			</div>


		</div>
	</div>
<script language="javascript" type="text/javascript">
function validate(){ 
     var start = document.getElementById('start').value;
     var stop= document.getElementById('stop').value;
     
     

     if (start==null || start=="" || name.length <= 2){
          alert("can't empty "); 
          return false;
     }
     else if (stop==null || stop==""){
          alert("can't empty"); 
          return false; 
     }
     
     
     return true;
} 
</script> 
<!-- //footer -->
</body>
</html>