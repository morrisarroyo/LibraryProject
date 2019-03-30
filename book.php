 <?php 
	session_start();
	//$_SESSION['login_user'] = 'food';
 ?>
 
 <button>home</button>
 <?php if (isset($_SESSION['login_user'])) {
	echo "<button>User</button>";
} ?>
 <button>My account</button>
 <button>Search</button>
 <?php 
	if (isset($_SESSION['login_user'])) {
		echo $_SESSION['login_user'];
		echo "<button>Sign out</button>";
	}
 ?>

<?php

session_start();
//echo "Sample PHP Code";
//checkLogin();
printCatalogue();
echo '<p><a href="test.php">Test</a></p>';






/*
	Log In Log Out with defined values;
	Reference:https://www.tutorialspoint.com/php/php_login_example.htm

*/
function checkLogin() {
	
	if (isset($_POST['login']) && !empty($_POST['uid']) 
	   && !empty($_POST['psw'])) {
		
	   if ($_POST['uid'] == '1' &&  // Checks if value user id input box == 1
		  $_POST['psw'] == '1') {   // Checks if value password input box == 1
		  $_SESSION['valid'] = true;
		  $_SESSION['timeout'] = time();
		  $_SESSION['uid'] = '1';
		  
		  //echo 'You have entered valid use name and password';
	   }else {
		  $msg = 'Wrong uid or password';
	   }
	   //header("Refresh:0");
	}
	if (isset($_POST['logout'])) {
		unset($_SESSION["uid"]);
	}
	//$msg = '';
	if (!isset($_SESSION['uid'])) {
		include('loginform.php');
	} else {
		include('logoutform.php');
	}
}

/*
	Print book table as a html table;
	Reference:https://www.w3schools.com/php/php_mysql_select.asp

*/
function printCatalogue() {
	
	$servername = "localhost";
	$username = "root";
	$password = "password";
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
	// 	die("Connection failed: " . $conn->connect_error);
	// }
	// echo "Database Connected successfully";

	$sql = "SELECT bookid, title,authorfirstname, authorlastname, isbn, year FROM book";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table><tr><th>BookID</th><th>Title</th><th>Author</th><th>ISBN</th><th>Year</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["bookid"]."</td><td>"
			.$row["title"] . "</td><td>"
			. $row["authorfirstname"].  " " . $row["authorlastname"]."</td><td>"
			. $row["isbn"]."</td><td>"
			. $row["year"]."</td><td>"
			. "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
}