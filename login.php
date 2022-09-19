
<?php
include('connection.php');
session_start();
$error = "Invalid Email or Password";

if(isset($_POST['submit']))
{
  $email=$_POST["email"];
  $password=($_POST["password"]);
  $sql="SELECT * from tb_login where email='".$email."' AND password='".$password."'";
  $res=mysqli_query($conn, $sql);
  if(mysqli_num_rows($res)>0)
  {
    $res_fetch=mysqli_fetch_assoc($res);
    $email=$res_fetch['email'];
    $password=$res_fetch['password'];
    $type=$res_fetch['type'];
    $_SESSION['type']="$type";
    $_SESSION['email']="$email";
  
    
      if($_SESSION['type']=='user')
      {
        
        
        $_SESSION['email']="$email";
        $_SESSION['id']=$res_fetch['login_id'];
        echo "<script>
        alert('welcome user');
        </script>";
  
        header("location:userpage.php");
        exit(0);
      }
      
     
      elseif($_SESSION['type']=='admin')
      {
        $_SESSION['message']="Welcome";
        echo "<script>
        alert('welcome admin');
        </script>";
        header("location:adminpage.php");
        
        exit(0);
      }
    
    else
    {
      echo "<script> alert('Please verify the email'); </script>";
    }
  }
  else
  {
    $_SESSION["error"] = $error;
    header("location:login.php");
    exit(0);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/signup</title>
     <!--Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
   <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <ul class="nav navbar-nav navbar-right">
	      <li><a href="index.html"><span class="glyphicon glyphicon-backward"></span> Return Home</a></li>
	    </ul>
    <!--//Style-CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

</head>
<body>
    <div class="w3l-signinform">
       
        <div class="wrapper">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h1><b></b>LOGIN HERE</h1><b></h1>
                    <p class="sub-para">Please login with your emailid and password</p>
                    
                    <form action="login.php" method="post">
                   
                        <?php
                           if (isset($_SESSION["error"])) {
                              $error = $_SESSION["error"];
                             }
                        ?>  
                        <div class="input-group">
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="email" placeholder="Emailid" name="email" required="">
                        </div>
                        <div class="input-group two-groop">
                            <span><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="Password" placeholder="Password" name="password" required=""><br>
                            
                        </div>
                        <div class="form-row bottom">
                            <div class="form-check">
                                <input type="checkbox" id="remenber" name="remenber" value="remenber">
                                <label for="remenber"> Remember me?</label>
                            </div>
                            <a href="#url" class="forgot">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
                    </form>
                
                    <p class="account">Don't have an account? <a href="register.html">Register</a></p>
                </div>
            </div>
          
            <!-- //main content -->
        </div>
        <?php
        unset($_SESSION["error"]);
        ini_set('display_errors', 1);
         ?>

        <!-- //container -->
        

</body>

</html>
