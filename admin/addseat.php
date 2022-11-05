<?php
include '../connection.php';
if(isset($_POST["submit"])){
	
    
    
    
    $train_name=$_POST["t1"];
    $date=$_POST["date"];
    $s_1A=$_POST["1a"];
    $s_2A=$_POST["2a"];
    $s_3A=$_POST["3a"];
    $s_uA=$_POST["ua"];
     $type=$_POST["type"];
   
	mysqli_query($conn,"INSERT INTO `seat`(`id`, `train_name`, `date`, `1A`, `2A`, `3A`, `Upper_seat`, `type`) VALUES ('','$train_name','$date','$s_1A','$s_2A','$s_3A','$s_uA','$type')");
	echo "<script language='javascript'>";
	echo 'window.location.href = "index1.php"';
	echo "alert('Add seat  details added succefully')";
	
	echo "</script>";
	
}

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Seat list added</title>
<!-- for-mobile-apps -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <a href="index1.php">  
    <span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a>
<!-- banner -->
<div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Route  &#128649;
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <table class="table table-bordered">
                    <tr>
                            <th>Train Name</th>
                            <td><input type="text" class="form-control" name="t1" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="date" class="form-control" name="date"  id=""></td>
                        </tr>
                        <h4>Adding Seatings</h4>
                        <tr>
                            <th>1A</th>
                            <td><input type="number" min='0'  class="form-control" name="1a"   id="">
                           
                        </tr>
                        <tr>
                            <th>2A</th>
                            <td><input type="number" min='0'  class="form-control" name="2a"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>3A</th>
                            <td><input type="number"    class="form-control" name="3a"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>upper_seat</th></th>
                            <td><input type="number" min='0'   class="form-control" name="ua" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td><select id="type" class="form-control" name="type" >
  <option value="first class">first class</option>
  <option value="second class">second class</option>
  <option value="general class">general class</option>
  <option value="ac">ac</option>
  <option value="sleeper class">sleeper class</option>
  <option value="ladies">ladies quota</option>
  
</select>
                            </td>
                        </tr>
                        <tr>
                            <th>To</th></th>
                            <td><input type="text"    class="form-control" name="to" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add seat" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        

<!-- //footer -->
</body>
</html>