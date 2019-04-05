<!DOCTYPE html>
<html lang="en">
<?php
require "databaseConstants.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection/Database failed: " . $conn->connect_error);
}

session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Login </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/footer.css">

</head>

<br>
<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


    <div class="container"  style="margin-top:3em; height: 32em;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form name="form1" action="" method="post">
                    <h2 class="text-center"> Login</h2><br><br>

                    <div class="text-center">
                        <input type="text" name="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div class="text-center">

                </div>
                    <br>

                        <div class="form-group">
                            <button type="submit" name="submit1" class="btn btn-primary btn-block btn-lg">Login</button>
                        </div>
                    <div class="clearfix"></div>

                    <p class="text-center"> Not a member? <a href="registration.php">  Create Account </a> </p>
                        <div class="clearfix"></div>
                        <br/>
                    </div>
                </form>
            </div>
        </div>
        </section>

        <?php
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    if(!isset($_POST['logout'])) {

    
    $myusername = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT userid FROM user_table WHERE email = '$myusername' and pass = '$mypassword'";
    //$result = mysqli_query($conn,$sql);
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        // session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location: index.php");
    } else {
        echo '
            <div class="alert alert-danger">
            <strong style="color:red">Invalid</strong> Username Or Password.
            </div>
        ';
    }
}
}
?>



    </div>


</body>

</html>

</html>
<?php
include 'footer.php'
?>