<!DOCTYPE html>
<html lang="en">
<?php

$servername = "localhost";
	$username = "root";
	$password = "Gkswnsqja135";
	$dbname = "library";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection/Database failed: " . $conn->connect_error);
}

session_start();

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h2>User Login</h2>

            <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div class="col-lg-12  col-lg-push-3">

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>

    <?php
        $msg = '';
       if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($conn,$_POST['email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $sql = "SELECT userid FROM user_table WHERE email = '$myusername' and pass = '$mypassword'";
        //$result = mysqli_query($conn,$sql);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
          
        if($count == 1) {
           //session_register("myusername");
           $_SESSION['login_user'] = $myusername;
           header("location: plain_page.php");
        }else {
           echo '
            <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Invalid</strong> Username Or Password.
            </div>
        ';
        }
     }
  ?> 



</div>


</body>
</html>
