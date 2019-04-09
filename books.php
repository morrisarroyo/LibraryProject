
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
			  <a class="nav-link active" href="userbook_account.php">Books <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="user_list.php">Users</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="userbook_account.php">Borrowed</a>
    </li>

		  <li class="nav-item">
			<a class="nav-link" href="search.php">Search</a>
		  </li>
			<li class="nav-item" style="width:40.5em;">
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
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrow'])) {
    borrowBooks();
    
}
function borrowBooks()
{
  require "databaseConstants.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $current_time = time();
  $sql = "INSERT INTO user_book (userid, bookid, date_borrowed, date_overdue, date_returned) VALUES 
                 (" . $_SESSION['userid'] . ", " . $_POST['bookid'] . ", " . $current_time . ", Null, Null)";
  $conn->query($sql);
}
?>


<?php
checkLogin();
printCatalogue();
 function printCatalogue()
{
    require ("databaseConstants.php");
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
    $sql = "SELECT bookid, title, authorfirstname, authorlastname, isbn, year FROM book WHERE bookid NOT IN 
            (SELECT bookid FROM USER_BOOK)";
    //$sql = "SELECT * FROM book LEFT JOIN USER_BOOK ON book.bookid=USER_BOOK.bookid WHERE userid = NULL";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '    <h1 style="margin-top: 2em;margin-bottom: 1em;text-align: center; color:  #0099ff
      "> Total Books: <b style=""">'.$result->num_rows.'</b> </h1>';
      echo '     <div class ="container" style="margin-bottm:10em">
      <h2 style="margin-top:2em;margin-left: 0.5em;"> Books</h2>';
      echo "<table class='table'>";
      echo '  <thead class="thead-dark">
              <tr>
                <th scope="col"> BookID</t/h>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">ISBN</th>
                <th scope="col">YEAR</th>
                <th scope="col">Borrow</th>
              </tr>
            </thead>';
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $user_id = $_SESSION['userid'];
            $book_id = $row["bookid"];
            $current_time = time();
                echo '<tr>';
                echo '<th scope="row">' . $row["bookid"] . '</th>';
                echo '<td>' . $row["title"] . '</td>';
                echo '<td>' . $row["authorfirstname"] . " " . $row["authorlastname"] . '</td>';
                echo '<td>' . $row["isbn"] . '</td>';
                echo '<td>' . $row["year"] . '</td>';
                echo '<td> <form role = "form" action = "books.php" method = "post">
                        <input name="bookid" value = "' . $book_id . '" type="hidden"/>
                        <input name="borrow" type="submit" value="Borrow"/>
                        </form>
                        </td>';

                echo '</tr>';
        }

        echo "</table></div>";
    } else {
        echo "0 results";
    }
    $conn->close();
}


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
}

include 'footer.php'
?>