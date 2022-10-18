

<?php
include '../connection.php';


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Train-LIst</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="../css/style_select.css" rel="stylesheet" type="text/css" media="all" />
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
	        <h1 class="w3layouts_head">Schedule List</h1>
	           <div class="w3layouts_main_grid">
	              
                                         <div class="w3_agileits_main_grid w3l_main_grid">
	                         
                                              <table class="table table-bordered" id="flight-list">
			<colgroup>
						
			    <col width="10%">
			     <col width="10%">
		                         <col width="10%">
			      <col width="15%">
			  </colgroup>
		       <thead>
		        <tr>
							
		        <th class="text-center">Date</th>
		        <th class="text-center">Time</th>
							
		        <th class="text-center">First Fee</th>
                                                <th class="text-center">Second Fee</th>
		         <th class="text-center">Action</th>
		         </tr>
		         </thead>
                                                 <tbody>
		             <?php
							
			$qry = $conn->query("SELECT * FROM schedule ");
			while($row = $qry->fetch_assoc()):
								
		               ?>
		<tr>
						 	
						 	
	                    <td class="text-right"><?php echo $row['date'] ?></td>
                                        <td class="text-right"><?php echo $row['time'] ?></td>
                                        <td class="text-right"><?php echo number_format($row['first_fee'],2 )?></td>
                                        <td class="text-right"><?php echo number_format($row['second_fee'],2 )?></td>

				
		
						
				
                                        <td class="text-center">
                                        <input type="submit" name="submit" value="edit" data-id="<?php echo $row['id']?>"><i class="fa fa-trash"></i>
                                        </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        </tbody>
		</table>
	</div>
                    <style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
                    </style>
                    </body>
                    </html>	                    