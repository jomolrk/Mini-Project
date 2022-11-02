<?php
include '../connection.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Route list added</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Routes</h3>
                            <div class='float-right'>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Route &#128645;
                                </button></div>
                        </div>

                        <div class="card-body">
                        <form action="#" method="POST">
                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                      ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
		                                <th>From</th>
                                        <th>station1</th>
                                        <th>station1 Arrival</th>
                                        <th>station2</th>
                                        <th>station2 Arrival</th>
                                        <th>station3</th>
                                        <th>station3 Arrival</th>
	                                	<th>To</th></th>
                                        
                                        <th style="width: 30%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row =mysqli_query($conn,"SELECT * FROM route");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td>
                                            <input class="trains_input" type="text" value="<?php echo ++$sn; ?>">
                                            <input class="trains_input" type="text" readonly name="r_id" value="<?php echo $fetch['id'] ?>">
                                        </td>
                                        <td><input class="trains_input" type="text" name="from" value="<?php echo $fetch['from']; ?>"></td>
                                        <td><input class="trains_input" type="text" name="station1" value="<?php echo $fetch['station1']; ?>"></td>
                                        <td><input class="trains_input" type="time" name="station1Arrival" value="<?php echo $fetch['stn1arr']; ?>"></td>
                                        <td><input class="trains_input" type="text" name="station2 value="<?php echo $fetch['station2']; ?>"></td>
                                        <td><input class="trains_input" type="time" name="station2Arrival" value="<?php echo $fetch['stn2arr']; ?>"></td>
                                        <td><input class="trains_input" type="text" name="station3" value="<?php echo $fetch['station3']; ?>"></td>
                                        <td><input class="trains_input" type="time" name="station3Arrival" value="<?php echo $fetch['stn3arr']; ?>"></td>
                                        <td><input class="trains_input" type="text" name="to" value="<?php echo $fetch['to']; ?>"></td>
                                        <td>
                                            <input type="submit" name="edit" class="bt btn-primary" value="Edit">
                                            <input type="submit" name="del_train" class="bt btn-danger" value="Delete">
                                        </td>
                                    </tr>
                                     

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <h4 class="modal-title">Editing <?php echo $fullname;?>&#128642;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                            <p>From: <input type="text" class="form-control"
                                                                name="from" value="<?php echo $fetch['from'] ?>"
                                                                required minlength="3" id=""></p>
                                                        <p>Station1: <input type="text" class="form-control"
                                                                name="station1" value="<?php echo $fetch['station1'] ?>"
                                                                required minlength="3" id=""></p>
                                                        <p>Station1 Arrival : <input type="time" 
                                                                class="form-control"
                                                                value="<?php echo $fetch['stn1arr'] ?>"
                                                                name="station1Arrival" required id="">
                                                        </p>
                                                        <p>Station2 : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['station2'] ?>"
                                                                name="station1" required id="">
                                                        </p>
                                                        <p> Station2 Arrival : <input type="time"
                                                                class="form-control"
                                                                value="<?php echo $fetch['stn2arr'] ?>"
                                                                name="station2Arrival" required id="">
                                                        </p>
                                                        <p>Station3: <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['station3'] ?>"
                                                                name="station3" required id="">
                                                        </p>
                                                        <p>Station3 Arrival: <input type="time" 
                                                                class="form-control"
                                                                value="<?php echo $fetch['stn3arr'] ?>"
                                                                name="station3Arrival" required id="">
                                                        </p>
                                                        <p>To : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['to'] ?>"
                                                                name="to" required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Train"
                                                                name='edit'>
                                                        </p>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <?php
                                    }
                                        ?>

                                </tbody>
                               
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
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
                            <th>From</th>
                            <td><input type="text" class="form-control" name="from" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Station1</th>
                            <td><input type="text" class="form-control" name="station1" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Station1 Arrival</th>
                            <td><input type="time" min='0' class="form-control" name="station1Arrival" value= "<?php echo $fetch['stn1arr'] ?>"  required id=""></td>
                        </tr>
                        <tr>
                            <th>Station2</th>
                            <td><input type="text" min='0' class="form-control" name="station2" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station2 Arrival</th>
                            <td><input type="time" min='0' class="form-control" name="station2Arrival"value="<?php echo $fetch['stn2arr'] ?>" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3</th></th>
                            <td><input type="text" min='0' class="form-control" name="station3" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3 Arrival</th></th>
                            <td><input type="time" min='0' class="form-control" name="station3Arrival"value="<?php echo $fetch['3'] ?>"  required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>To</th></th>
                            <td><input type="text" min='0' class="form-control" name="to" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add Route" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
</html>

<?php

    if (isset($_POST['submit'])) {
        $from = $_POST['from'];
        $station1 = $_POST['station1'];
        $stn1arr= $_POST['stn1arr'];
        $station2 = $_POST['station2'];
        $stn2arr = $_POST['stn2arr'];
        $station3= $_POST['station3'];
        $stn3arr= $_POST['stn3arr'];
        $to = $_POST['to'];
        if (!isset($from,$station1, $stn1arr, $station2,$stn2arr,$station3,$stn3arr,$to)) {
            echo("Fill Form Properly!");
        } else {
            mysqli_query($conn,"INSERT INTO `route`( `from`, `station1`, `stn1arr`, `station2`, `stn2arr`, `station3`, `stn3arr`, `to`) VALUES (' $from','$station1','$stn1arr','$station2','$stn2arr','$station3','$stn3arr','$to')");
            echo "<script language='javascript'>";
	echo 'window.location.href = "Routes.php"';
	echo "alert('Route details added succefully')";
	
	echo "</script>";
	

             }
             }

   
    if (isset($_POST['edit'])) {
        $fr = $_POST['from'];
        $s1 = $_POST['station1'];
        $s1arr= $_POST['stn1arr'];
        $s2 = $_POST['station2'];
        $s2arr = $_POST['stn2arr'];
        $s3= $_POST['station3'];
        $stn3arr= $_POST['stn3arr'];
        $to = $_POST['to'];
if (!isset($from,$station1, $stn1arr, $station2,$stn2arr,$station3,$stn3arr,$to)) {
    echo "<script>alert('Route fill properly !!');</script>";
}
        else {
                $modify_route_sql= "UPDATE `route` SET `from`='$fr',`station1`='$s1',`stn1arr`='$s1arr',`station2`='s2',`stn2arr`='$s2arr',`station3`='$s3',`stn3arr`='$s3arr',`to`='$to' "; 
                $edit_res= mysqli_query($conn,$modify_trains_sql);
                if($edit_res){
                    echo "<script>alert('Route Modified!')</script>";
                }
                else{
                    echo "<script>alert('Route not Modified!')</script>";
                }
                echo "<script>window.location.href = 'Routes.php';</script>";
            }
        }
    

    if (isset($_POST['del_route'])) {
        $rid= $_POST['r_id'];
        $del_res= mysqli_query($conn, "DELETE FROM route WHERE id = '$rid'");
        if(mysqli_affected_rows($conn) >= 1){
            echo "<script>alert('Route Deleted !!');</script>";
        }
        else{
            echo "<script>alert('Route Could Not Be Deleted !!');</script>";
        }
        echo "<script>window.location.href = 'Routes.php';</script>";
    }
?>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal"
    data-target="#edit<?php echo $id ?>">
    Edit
</button> -

<input type="hidden" class="form-control" name="del_train"
    value="<?php echo $id ?>" required id="">
<button type="submit"
    onclick="return confirm('Are you sure about this?')"
    class="btn btn-danger">
    Delete
</button> -->