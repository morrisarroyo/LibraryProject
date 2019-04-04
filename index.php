
 <?php
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
			  <a class="nav-link" href="userbook_account.php">My Account <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="user_list.php">Users</a>
			</li>

		  <li class="nav-item">
			<a class="nav-link" href="search.php">Search</a>
		  </li>
			<li class="nav-item" style="width:42em;">
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

<?php
//echo "Sample PHP Code";
checkLogin();
printCatalogue();
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
    if (!isset($_SESSION['login_user'])) {
        include 'loginform.php';
    } else {
        include 'logoutform.php';
    }
}
/*
Print book table as a html table;
Reference:https://www.w3schools.com/php/php_mysql_select.asp
 */
function printCatalogue()
{

    $servername = "localhost";
    $username = "root";
    $password = "Gkswnsqja135";
    $dbname = "library";
    /*
    $link = mysql_connect('localhost', 'root', 'password');
    $db_list = mysql_list_dbs($link);
    while ($row = mysql_fetch_object($db_list)) {
    echo $row->Database . "\n";
    }
     */
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Database Connected successfully";
    $sql = "SELECT bookid, title,authorfirstname, authorlastname, isbn, year FROM book";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table><tr><th>BookID</th><th>Title</th><th>Author</th><th>ISBN</th><th>Year</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["bookid"] . "</td><td>"
                . $row["title"] . "</td><td>"
                . $row["authorfirstname"] . " " . $row["authorlastname"] . "</td><td>"
                . $row["isbn"] . "</td><td>"
                . $row["year"] . "</td><td>"
                . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
}
include 'footer.php'
?>