<?php
include '../connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Schedule list added</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
        
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
                                All Dynamic Schedules</h3>
                            <div class='float-right'>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New One-Time Schedule &#128645;
                                </button> - - - <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#add2">
                                    Add Range Schedule &#128645;
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Train</th>
		                                
                                        <th>Route</th>
                                        <th>F.C Fee</th>
                                        <th>S.C Fee</th>
		                                <th>Sleeper Fee</th>
                                        <th>G Fee </th>
                                       <th>AC Fee </th>
	                                    <th>L Fee </th>
                                        <th>Total Bookings</th>
                                        <th>Date/Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row =mysqli_query($conn,"SELECT * FROM schedule ORDER BY id DESC");

                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id']; ?><tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $train->id->tname($fetch['train_id']); ?></td>
                                        <td><?php echo $route->id->station1($fetch['route_id']);
                                                $fullname = " Schedule" ?></td>
                                        <td>$ <?php echo ($fetch['first_fee']); ?></td>
                                        <td>$ <?php echo ($fetch['second_fee']); ?></td>
                                        <td>$ <?php echo ($fetch['sleeper_fee']); ?></td>
                                        <td>$ <?php echo ($fetch['general_fee']); ?></td>
                                        <td>$ <?php echo ($fetch['ac_fee']); ?></td>
                                        <td>$ <?php echo ($fetch['lad_fee']); ?></td>
                                        <td><?php echo $fetch['date'], " / ", formatTime($fetch['time']); ?></td>

                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> -

                                                <input type="hidden" class="form-control" name="del_train"
                                                    value="<?php echo $id ?>" required id="">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure about this?')"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                        ?> &#128642;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">


                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">

                                                        <p>Train : <select class="form-control" name="train_id" required
                                                                id="">
                                                                <option value="">Select Train</option>
                                                                <?php
                                                                    $cons = mysqli_query($conn,"SELECT * FROM train");
                                                                    while ($fetch = $cons->fetch_assoc()) {
                                                                        echo "<option " . ($fetch['train_id'] == $t['id'] ? 'selected="selected"' : '') . " value='" . $t['id'] . "'>" . $t['name'] . "</option>";
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </p>

                                                        <p>Route : <select class="form-control" name="route_id" required
                                                                id="">
                                                                <option value="">Select Route</option>
                                                                <?php
                                                                    $cond = mysqli_query($conn,"SELECT * FROM route");
                                                                    while ($fetch = $cond->fetch_assoc()) {
                                                                        echo "<option  " . ($fetch['route_id'] == $r['id'] ? 'selected="selected"' : '') . " value='" . $r['id'] . "'>" . getRoutePath($r['id']) . "</option>";
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </p>
                                                        <p>
                                                            First Class Charge : <input class="form-control"
                                                                type="number" value="<?php echo $fetch['first_fee'] ?>"
                                                                name="first_fee" required id="">
                                                        </p>
                                                        <p>
                                                            Second Class Charge : <input class="form-control"
                                                                type="number" value="<?php echo $fetch['second_fee'] ?>"
                                                                name="second_fee" required id="">
                                                        </p>
		                <p>
                                                            sleeper Charge : <input class="form-control"
                                                                type="number" value="<?php echo $fetch['sleeper_fee'] ?>"
                                                                name="sleeper" required id="">
                                                        </p>
                                                        <p>
                                                            Date :
                                                            <input type="date" class="form-control"
                                                                onchange="check(this.value)" id="date"
                                                                placeholder="Date" name="date" required
                                                                value="<?php echo (date('Y-m-d', strtotime($fetch["date"]))) ?>">

                                                        </p>
                                                        <p>
                                                            Time : <input class="form-control" type="time"
                                                                value="<?php echo $fetch['time'] ?>" name="time"
                                                                required id="">
                                                        </p>
                                                        <p class="float-right"><input type="submit" name="edit"
                                                                class="btn btn-success" value="Edit Schedule"></p>
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
                <h4 class="modal-title">Add New Schedule &#128649;
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            Train : <select class="form-control" name="train_id" required id="">
                                <option value="">Select Train</option>
                                <?php
                               $cond = mysqli_query($conn,"SELECT * FROM trains");
                               while ($fetch = $cond->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                                 
                                                                    
                            </select>

                        </div>
                        <div class="col-sm-6">
                            Route : <select class="form-control" name="route_id" required id="">
                                <option value="">Select Route</option>
                                <?php
                                 $cond = mysqli_query($conn,"SELECT * FROM trains");
                                 while ($fetch = $cond->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . getRoutePath($row['id']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            First Class Charge : <input class="form-control" type="number" name="first_fee" required
                                id="">
                        </div>
                        <div class="col-sm-6">

                            Second Class Charge : <input class="form-control" type="number" name="second_fee" required
                                id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            Date : <input class="form-control" onchange="check(this.value)" type="date" name="date"
                                required id="date">
                        </div>
                        <div class="col-sm-6">

                            Time : <input class="form-control" type="time" name="time" required id="">
                        </div>
                    </div>
                    <hr>
                    <input type="submit" name="submit" class="btn btn-success" value="Add Schedule"></p>
                </form>

                <script>
                function check(val) {
                    val = new Date(val);
                    var age = (Date.now() - val) / 31557600000;
                    var formDate = document.getElementById('date');
                    if (age > 0) {
                        alert("Past/Current Date not allowed");
                        formDate.value = "";
                        return false;
                    }
                }
                </script>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="add2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add Range Schedule &#128649;
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            Train : <select class="form-control" name="train_id" required id="">
                                <option value="">Select Train</option>
                                <?php
                                 $cond = mysqli_query($conn,"SELECT * FROM trains");
                                 while ($fetch = $cond->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-sm-6">
                            Route : <select class="form-control" name="route_id" required id="">
                                <option value="">Select Route</option>
                                <?php
                                $cond = mysqli_query($conn,"SELECT * FROM route");
                                while ($fetch = $cond->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . getRoutePath($row['id']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            First Class Charge : <input class="form-control" type="number" name="first_fee" required>
                        </div>
                        <div class="col-sm-6">

                            Second Class Charge : <input class="form-control" type="number" name="second_fee" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            From Date : <input class="form-control" onchange="check(this.value)" type="date"
                                name="from_date" required>
                        </div>
                        <div class="col-sm-6">
                            End Date : <input class="form-control" onchange="check(this.value)" type="date"
                                name="to_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"> Every :
                            <select class="form-control" name="every">
                                <option value="Day">Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col-sm-6">

                            Time : <input class="form-control" type="time" name="time" required id="">
                        </div>
                    </div>
                    <hr>
                    <input type="submit" name="submit2" class="btn btn-success" value="Add Schedule"></p>
                </form>

                <script>
                function check(val) {
                    val = new Date(val);
                    var age = (Date.now() - val) / 31557600000;
                    var formDate = document.getElementById('date');
                    if (age > 0) {
                        alert("You are using a past/current date!");
                        val.value = "";
                        return false;
                    }
                }
                </script>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
<?php

if (isset($_POST['submit'])) {
    $route_id = $_POST['route_id'];
    $train_id = $_POST['train_id'];
    $first_fee = $_POST['first_fee'];
    $second_fee = $_POST['second_fee'];
    $sleeper_fee= $_POST['sleeper_fee'];
    $gen_fee = $_POST['general_fee'];
    $ac_fee = $_POST['ac_fee'];
    $lad_fee = $_POST['lad_fee'];
    $date = $_POST['date'];
    $date = formatDate($date);
    // die($date);
    // $endDate = date('Y-m-d' ,strtotime( $data['automatic_until'] ));
    $time = $_POST['time'];
    if (!isset($route_id, $train_id, $first_fee, $second_fee, $date, $time)) {
       echo "<script> alert('Fill Form Properly!');</script>";
    } 
    else {

        $ins = $conn->prepare("INSERT INTO `schedule`(`id`, `train_id`, `route_id`, `date`, `time`, `first_fee`, `second_fee`, `sleeper_fee`, `general_fee`, `ac_fee`, `lad_fee`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')");
        
        echo "<script> alert('schedule added!');</script>";
    }
}


if (isset($_POST['submit2'])) {
    $route_id = $_POST['route_id'];
    $train_id = $_POST['train_id'];
    $first_fee = $_POST['first_fee'];
    $second_fee = $_POST['second_fee'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $every = $_POST['every'];

    $time = $_POST['time'];
    if (!isset($route_id, $train_id, $first_fee, $second_fee, $date, $time)) {
        echo "<script> alert('Fill Form Properly!');</script>";
    } else {


        $from_date = formatDate($from_date);
        $to_date = formatDate($to_date);
        $startDate = $from_date;
        $endDate = $to_date;

        if ($every == 'Day') {
            for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) {
                $date = date('d-m-Y', $i);
                $ins = $conn->prepare("INSERT INTO `schedule`(`id`, `train_id`, `route_id`, `date`, `time`, `first_fee`, `second_fee`, `sleeper_fee`, `general_fee`, `ac_fee`, `lad_fee`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')");
               ;
            }
        } else {
            for ($i = strtotime($every, strtotime($startDate)); $i <= strtotime($endDate); $i = strtotime('+1 week', $i)) {
                $date = date('d-m-Y', $i);

                $ins = $conn->prepare("INSERT INTO `schedule`(`id`, `train_id`, `route_id`, `date`, `time`, `first_fee`, `second_fee`, `sleeper_fee`, `general_fee`, `ac_fee`, `lad_fee`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')");
               
            }
        }


       echo "<script>alert('Schedules Added!');</script> ";
        
    }
}


if (isset($_POST['edit'])) {
    $route_id = $_POST['route_id'];
    $train_id = $_POST['train_id'];
    $first_fee = $_POST['first_fee'];
    $second_fee = $_POST['second_fee'];
    $date = $_POST['date'];
    $date = formatDate($date);
    $time = $_POST['time'];
    $id = $_POST['id'];
    if (!isset($route_id, $train_id, $first_fee, $second_fee, $date, $time)) {
        echo "<script>alert('Fill Form Properly!');</script>";
    } else {
    
        $ins = $conn->prepare("UPDATE `schedule` SET `train_id`=?,`route_id`=?,`date`=?,`time`=?,`first_fee`=?,`second_fee`=? WHERE id = ?");
        
        $msg = "Having considered user's satisfactions and every other things, we the management are so sorry to let inform you that there has been a change in the date and time of your trip. <hr/> New Date : $date. <br/> New Time : ".formatTime($time)." <hr/> Kindly disregard if the date/time still stays the same.";
        $e = $conn->query("SELECT tbl_login.email FROM tbl_login INNER JOIN booked ON booked.user_id = passenger.id WHERE booked.schedule_id = '$id' ");
        while($getter = $e->fetch_assoc()){
            @sendMail($getter['email'], "Change In Trip Date/Time", $msg);
        }
        alert("Schedule Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['del_train'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM schedule WHERE id = '" . $_POST['del_train'] . "'");
    if ($con->affected_rows < 1) {
        alert("Schedule Could Not Be Deleted. This Route Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Schedule Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>