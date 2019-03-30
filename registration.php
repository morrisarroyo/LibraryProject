
<!DOCTYPE html>
<html lang="en">
<?php

//require 'config/constants.php';

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

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->

    <title>User Registration Form | LMS </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <br><br>
                    <h2>User Registration</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="First Name" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>

                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>

                    <div>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password" required=""/>
                    </div>

                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="register" value="Register">
                    </div>

                <br><br>
                    <div class="separator">
                <p class="change_link">Aready a member?
                    <a href="login.php"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br/>

                </form>
            </section>

            <?php
            $registeration_msg ='';
            ?>
            <?php
            if (isset($_POST["register"]))
            {   $sql = "INSERT INTO user_table (firstname, lastname, email, pass, islibrarian, fine) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[password]', false, 0.00)";
                $conn->query($sql);
                echo '
                <div class="alert alert-success col-lg-6 col-lg-push-3">
                Registration successfully, You will get email when your account is approved
            </div>
                ';
            }
            
            $conn->close();

            ?>


    </div>




</body>
</html>
