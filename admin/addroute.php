<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $station1 = $_POST['station1'];
    $stn1arr= $_POST['stnarr'];
    $station2 = $_POST['station2'];
    $stn2arr = $_POST['stn2arr'];
    $station3= $_POST['station3'];
    $stn3arr= $_POST['stn3arr'];
    $to = $_POST['to'];
    
        mysqli_query($conn,"INSERT INTO `route`( `from`, `station1`, `stn1arr`, `station2`, `stn2arr`, `station3`, `stn3arr`, `to`) VALUES (' $from','$station1','$stn1arr','$station2','$stn2arr','$station3','$stn3arr','$to')");
        echo "<script language='javascript'>";
echo 'window.location.href = "Routes.php"';
echo "alert('Route details added succefully')";

echo "</script>";
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Route insert</title>
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
                            <td><input type="time" min='0'  class="form-control" name="stnarr"   id="">
                           
                        </tr>
                        <tr>
                            <th>Station2</th>
                            <td><input type="text" min='0'  class="form-control" name="station2"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station2 Arrival</th>
                            <td><input type="time"    class="form-control" name="stn2arr" runat="server" id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3</th></th>
                            <td><input type="text" min='0'   class="form-control" name="station3" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3 Arrival</th>
                            <td><input type="time"     class="form-control" name="stn3arr" runat="server" id="">
                            </td>
                        </tr>
                        <tr>
                            <th>To</th></th>
                            <td><input type="text"    class="form-control" name="to" required id="">
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
        
</body></html>

