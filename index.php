<?php
require 'databaseConstants.php';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
if (session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
?>
<?php
// include('navbar.php');
echo '
	<!DOCTYPE html>
	<html>

	<head>
	  <meta charset="utf-8" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Page Title</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
      <link rel="stylesheet" href="css/footer.css">

	</head>

	<body>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">
		  <img src="images/home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		  Library Application
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
		  aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="userbook_account.php"> <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="user_list.php"></a>
			</li>

		  <li class="nav-item">
			<a class="nav-link" href="search.php"></a>
		  </li>
			<li class="nav-item" style="width:54.5em;">
			<a class="nav-link" href="#"></a>
		  </li>
			';
echo '<li> <a style="color:blue;" class="nav-link" href"="#">';
echo $_SESSION['login_user'];
echo '</a></li>';
echo '	<li class="nav-item">
			<form role = "form" action = "index.php" method = "post">
			<button type="submit" name="logout"> Log Out</button>
		 	</form>
		 	</li>
		  </ul>
		</div>
	  </nav>
	';
?>

<body>
<!-- <div class ="container" style="margin-top:3em;border: 1px solid black">
    <div style="width: 15em; margin: 0 auto; margin-top: 1.5em; margin-bottom:1.5em r">
    <h1> Dashboard </h1>
    </div>
    <div style="width: 20em; height: 20em;border: 1px solid black">
      <div style="border: 1px solid black">
        <h2> Manage Books</h2>
        <div class="inner">
              <?php
                $sql = "SELECT * FROM book";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Books</p>
            </div>
      </div>
</div> -->

<div class ="container">
<div style="width: 13em; margin: 0 auto; margin-top: 5em; margin-bottom:2em">
    <h1> Dashboard </h1>
    </div>
<div class="row" style="border: 1px solid black; margin-top: 5em; margin-bottom: 5em;">

        <div class="col-lg-3 col-lg-3">
          <!-- small box -->
          <div class="" style=" width:10em; margin: 0 auto; margin-top: 1em; margin-bottom: 1em;">
            <div class="">
              <?php
                $sql = "SELECT * FROM book";
                $query = $conn->query($sql);

                echo "<h3 style='font-size: 4em;'>".$query->num_rows."</h3>";
              ?>
              <p style='font-size: 1.5em;'>Total Books</p>
            </div>
            <div class="  " style="width: 5em; position: relative;">
              <!-- <i class="fa fa-book" src=""></i> -->
            </div>
            <a href="books.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-green" style="width:10em; margin: 0 auto;margin-top: 1em; margin-bottom: 1em;">
            <div class="inner">
              <?php
                $sql = "SELECT userid FROM user_table";
                $query = $conn->query($sql);

                echo "<h3 style='font-size: 4em;'>".$query->num_rows."</h3>";
              ?>
          
              <p style='font-size: 1.5em;'>Search</p>
            </div>
            <!-- <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div> -->
            <a href="search.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-yellow" style="width:10em; margin: 0 auto;margin-top: 1em; margin-bottom: 1em;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM user_table";
                $query = $conn->query($sql);

                echo "<h3 style='font-size: 4em;'>".$query->num_rows."</h3>";
              ?>
             
              <p style='font-size: 1.5em;'>Total Users</p>
            </div>
            <!-- <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div> -->
            <a href="user_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-red" style="width:10em; margin: 0 auto;margin-top: 1em; margin-bottom: 1em;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM book";
                $query = $conn->query($sql);

                echo "<h3 style='font-size: 4em;'>".$query->num_rows."</h3>";
              ?>

              <p style='font-size: 1.5em;'>Total Borrowed</p>
            </div>
            <!-- <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div> -->
            <a href="userbook_account.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
  </div>

</body>

<?php
//echo "Sample PHP Code";
checkLogin();
// printCatalogue();
/*
Log In Log Out with defined values;
Reference:https://www.tutorialspoint.com/php/php_login_example.htm
 */
function checkLogin()
{

    if (isset($_POST['login']) && !empty($_POST['uid'])
        && !empty($_POST['psw'])) {

        if ($_POST['uid'] == '1' && // Checks if value user id input box == 1
            $_POST['psw'] == '1') { // Checks if value password input box == 1
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['uid'] = '1';

            //echo 'You have entered valid use name and password';
        } else {
            $msg = 'Wrong uid or password';
        }
        //header("Refresh:0");
    }
    if (isset($_POST['logout'])) {
        unset($_SESSION['login_user']);
        header("Location: login.php");

    }
    //$msg = '';
    // if (!isset($_SESSION['login_user'])) {
    //     include 'loginform.php';
    // } else {
    //     include 'logoutform.php';
    // }
}
/*
Print book table as a html table;
Reference:https://www.w3schools.com/php/php_mysql_select.asp
 */
function printCatalogue()
{

    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Database Connected successfully";
    $sql = "SELECT bookid, title,authorfirstname, authorlastname, isbn, year FROM book";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '     <div class ="container">
      <h2 style="margin-top:4em; margin-left: 0.5em;"> </h2>';
        echo "<table class='table'>";
        echo '  <thead class="thead-dark">
              <tr>
                <th scope="col"> BookID</t/h>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">ISBN</th>
                <th scope="col">YEAR</th>
                <th scope="col">BUTTON</th>
              </tr>
            </thead>';
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $row["bookid"] . '</th>';
            echo '<td>' . $row["title"] . '</td>';
            echo '<td>' . $row["authorfirstname"] . " " . $row["authorlastname"] . '</td>';
            echo '<td>' . $row["isbn"] . '</td>';
            echo '<td>' . $row["year"] . '</td>';
            echo '<td> <button name="return" type="submit">Return</button></td>';
            echo '</tr>';
        }
        echo "</table></div>";
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>
<?php
include 'footer.php'
?>