<?php
    include '../connection.php';
    @session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Train list added</title>

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
    
    <div class="content">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">All Trains</h3>
                                <div class='float-right'>
                                    <button type="button" class="bt btn-primary" data-toggle="modal"
                                    data-target="#add">Add New Train &#128645;</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="#" method="POST">
                                    <table id="example1" style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Train code</th>
                                                <th>Train Name</th>
                                                <th>First Class </th>
                                                <th>Second Class </th>
                                                <th>Sleeper Class</th>
                                                <th>General Quota </th>
                                            <th>AC coach </th>
                                                <th>Ladies Quota </th>
                                                <th style="width: 30%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $row =mysqli_query($conn,"SELECT * FROM trains");
                                                if ($row->num_rows < 1) echo "No Records Yet";
                                                $sn = 0;
                                                while ($fetch = $row->fetch_assoc()) {
                                                    $id = $fetch['id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <input class="trains_input" type="text" value="<?php echo ++$sn; ?>">
                                                        <input class="trains_input" type="text" readonly name="t_id" value="<?php echo $fetch['id'] ?>">
                                                    </td>
                                                    <td><input class="trains_input" type="text" name="t_code" value="<?php echo $fetch['t_code']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="tname" value="<?php echo $fetch['tname']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="firstclass" value="<?php echo $fetch['first class']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="secondclass" value="<?php echo $fetch['secondclass']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="sleeperclass" value="<?php echo $fetch['sleeperclass']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="generalqouta" value="<?php echo $fetch['generalqouta']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="aircond" value="<?php echo $fetch['AC']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="ladiesquota" value="<?php echo $fetch['ladiesquota']; ?>"></td>
                                                    <td>
                                                        <input type="submit" name="edit" class="bt btn-primary" value="Edit">
                                                        <input type="submit" name="del_train" class="bt btn-danger" value="Delete">
                                                    </td>
                                                </tr>
                                            

                                            <div class="modal fade" id="edit<?php echo $id ?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required id="">
                                                                    <p>Train Code: <input type="text" class="form-control" name="t_code" value="<?php echo $fetch['t_code'] ?>" required minlength="3" id=""></p>
                                                                    <p>Train Name : <input type="text" class="form-control" name="tname" value="<?php echo $fetch['tname'] ?>" required minlength="3" id=""></p>
                                                                    <p>First Class Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['first class'] ?>" name="firstclass" required id=""></p>
                                                                    <p> Second Class Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['secondclass'] ?>" name="secondclass" required id=""></p>
                                                                    <p> Sleeper Class Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['sleeperclass'] ?>" name="sleeperclass" required id=""></p>
                                                                <p>General Quota : <input type="number" min='0' class="form-control" value="<?php echo $fetch['generalqouta'] ?>" name="generalqouta" required id=""></p>
                                                                <p> Ac Coach: <input type="number" min='0' class="form-control" value="<?php echo $fetch['AC'] ?>" name="AC" required id=""></p>
                                                                <p> Ladies Quota : <input type="number" min='0' class="form-control" value="<?php echo $fetch['ladiesquota'] ?>" name="ladiesquota" required id=""></p>
                                                                <p><input class="btn btn-info" type="submit" value="Edit Train" name='edit'></p>
                                                            </form>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                                <!-- /.modal -->
                                            <?php } ?>

                                        </tbody>
                                    
                                    </table>
                                </form>
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
                                <th>Train Code</th>
                                <td><input type="text" class="form-control" name="t_code" required minlength="3" id=""></td>
                            </tr>
                            <tr>
                                <th>Train Name</th>
                                <td><input type="text" class="form-control" name="name" required minlength="3" id=""></td>
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
                                <td><input type="number" min='0' class="form-control" name="second_seat" required id="">
                                </td>
                            </tr>
                            <tr>
                                <th>General Quota</th>
                                <td><input type="number" min='0' class="form-control" name="second_seat" required id="">
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

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>

    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <script>
    $(function() {
        /* jQueryKnob */

        $('.knob').knob({
            draw: function() {}
        })

    })
    </script>


</body>
</html>

<?php

    if (isset($_POST['submit'])) {
        $code = $_POST['t_code'];
        $tname = $_POST['tname'];
        $first_class = $_POST['firstclass'];
        $second_class = $_POST['secondclass'];
        $sleeper_class = $_POST['sleeperclass'];
        $gen = $_POST['generalquota'];
        $AC = $_POST['AC'];
        $lad = $_POST['ladiesquota'];
        if (!isset($code,$tname, $first_class, $second_class,$sleeper_class,$gen,$tatkal,$lad)) {
            echo "<script>alert('Train list added properly!')</script>";
        } else {
            $check = mysqli_query($conn,"SELECT * FROM trains WHERE tname = '$tname' ")->num_rows;
            if ($check) {
                echo("Train exists");
            } else {
                mysqli_query($conn,"INSERT INTO `trains`( `t_code`, `tname`, `first class`, `secondclass`, `sleeperclass`, `generalqouta`, `AC`, `ladiesquota`)
                VALUES (' $code ','$tname','$first_class','$second_class','$sleeper_class',' $gen ','$AC','$lad')");
            echo "<script language='javascript'>";
            echo 'window.location.href = "trains.php"';
            echo "alert('train details added succefully')";
            
            echo "</script>";
            
                
            }
        }
    }

    if (isset($_POST['edit'])) {
        $tid= $_POST['t_id'];
        $code = $_POST['t_code'];
        $tname = $_POST['tname'];
        $first_class = $_POST['firstclass'];
        $second_class = $_POST['secondclass'];
        $sleeper_class = $_POST['sleeperclass'];
        $gen = $_POST['generalqouta'];
        $ac = $_POST['aircond'];
        $lad = $_POST['ladiesquota'];
        
        if (!isset($code,$tname, $first_class, $second_class,$sleeper_class ,$gen ,$ac,$lad)) {
            echo "<script>alert('Train list added properly!')</script>";
        } 
        else {    
            $check = mysqli_query($conn,"SELECT * FROM trains WHERE tname = '$tname' ")->num_rows;
            if ($check == 2) {
                echo("Train name exists");
            } else {
                $modify_trains_sql= "UPDATE `trains` SET `t_code`='$code',`tname`='$tname',`first class`='$first_class',`secondclass`='$second_class',`sleeperclass`='$sleeper_class',`generalqouta`='$gen',`AC`='$ac',`ladiesquota`='$lad' WHERE id=$tid"; 
                $edit_res= mysqli_query($conn,$modify_trains_sql);
                if($edit_res){
                    echo "<script>alert('Train Modified!')</script>";
                }
                else{
                    echo "<script>alert('Train not Modified!')</script>";
                }
                echo "<script>window.location.href = 'trains.php';</script>";
            }
        }
    }

    if (isset($_POST['del_train'])) {
        $tid= $_POST['t_id'];
        $del_res= mysqli_query($conn, "DELETE FROM trains WHERE id = '$tid'");
        if(mysqli_affected_rows($conn) >= 1){
            echo "<script>alert('Train Deleted !!');</script>";
        }
        else{
            echo "<script>alert('Train Could Not Be Deleted. This Train Has Been Tied To Another Data !!');</script>";
        }
        echo "<script>window.location.href = 'trains.php';</script>";
    }
?>

 <!--<button type="button" class="btn btn-primary" data-toggle="modal"
    data-target="#edit<?php echo $id ?>">
    Edit
</button> -

<input type="hidden" class="form-control" name="del_train"
    value="<?php echo $id ?>" required id="">
<button type="submit"
    onclick="return confirm('Are you sure about this?')"
    class="btn btn-danger">
    Delete
</button>-->