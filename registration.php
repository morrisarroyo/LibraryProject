<!DOCTYPE html>
<html lang="en">
<?php

require("databaseConstants.php");
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

    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<br>


<body class="login" style="margin-top: -20px;">



    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form name="form1" action="" method="post">
                    <br><br>
                    <h2 class="text-center"> Library Register</h2><br>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="firstname" required="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required="" />
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" required="" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password"
                            required="" />
                    </div>

                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-primary btn-block btn-lg">Sign up</button>
                    </div>
                    <p class="text-center"> Already a member? <a href="login.php"> Sign In </a> </p>

                </form>
            </div>
        </div>
        </section>

        <?php
            $registeration_msg ='';
            ?>
        <?php
            if (isset($_POST["register"]))
            {   $sql = "INSERT INTO user_table (firstname, lastname, email, pass, islibrarian, fine) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[password]', false, 0.00)";
                $conn->query($sql);
                echo '
                <div class="alert alert-success">
                Registration successfully, You will get email when your account is approved
            </div>
                ';
            }
            
            $conn->close();

            ?>


    </div>




</body>

</html>