<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    $code = $_POST['tcode'];
    $tname = $_POST['tname'];
    $first_class = $_POST['firstclass'];
    $second_class = $_POST['secondclass'];
    $sleeper_class = $_POST['sleeperclass'];
    $gen = $_POST['generalquota'];
    $AC = $_POST['AC'];
    $lad = $_POST['ladiesquota'];
        mysqli_query($conn, "INSERT INTO `trains`( `t_code`, `tname`, `first class`, `secondclass`, `sleeperclass`, `generalqouta`, `AC`, `ladiesquota`)
                    VALUES (' $code ','$tname','$first_class','$second_class','$sleeper_class',' $gen ','$AC','$lad')");
        echo "<script language='javascript'>";
        echo 'window.location.href = "trains.php"';
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
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>

    <a href="index1.php">  
    <span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a>



    <div class="modal-dialog modal-lg">
            <div class="modal-content" align="center">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Train &#128646;
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

                        <table class="table table-bordered">
                        <tr>
                                <th>Train code</th>
                                <td><input type="text" class="form-control" name="tcode" required minlength="3" id=""></td>
                            </tr>
                            <tr>
                                <th>Train Name</th>
                                <td><input type="text" class="form-control" name="tname" required minlength="3" id=""></td>
                            </tr>
                            <tr>
                                <th>First Class Capacity</th>
                                <td><input type="number" min='0' class="form-control" name="firstclass" required id=""></td>
                            </tr>
                            <tr>
                                <th>Second Class Capacity</th>
                                <td><input type="number" min='0' class="form-control" name="secondclass" required id="">
                                </td>
                            </tr>
                            <tr>
                                <th>Sleeper Class Capacity</th>
                                <td><input type="number" min='0' class="form-control" name="sleeperclass" required id="">
                                </td>
                            </tr>
                            <tr>
                                <th>General Quota</th>
                                <td><input type="number" min='0' class="form-control" name="generalquota" required id="">
                                </td>
                            </tr>
                            <tr>
                                <th>AC Coach</th>
                                <td><input type="number" min='0' class="form-control" name="AC" required id="">
                                </td>
                            </tr>
                            <tr>
                                <th>Ladies Quota</th>
                                <td><input type="number" min='0' class="form-control" name="ladiesquota" required id="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <input class="btn btn-info" type="submit" value="Add Train" name='submit'>
                                </td>
                            </tr>
                        </table>
                    </form>



                </div>
</body></html>

