<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
require "databaseConstants.php";
$conn = new mysqli($servername, $username, $password, $dbname);
// include('navbar.php');
?>

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
		  Library Management
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
		  aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="books.php">Books <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
			  <a class="nav-link" href="user_list.php">Users</a>
			</li>

		  <li class="nav-item">
			<a class="nav-link" href="userbook_account.php">Borrowed</a>
      </li>
      
      <li class="nav-item">
			<a class="nav-link" href="search.php">Search</a>
      </li>
      
			<li class="nav-item" style="width:38em;">
			<a class="nav-link" href="#"></a>
		  </li>
			';
echo '<li> <a style="color:blue;" class="nav-link" href"="#">';
echo $_SESSION['login_user'];
echo '</a></li>';
echo '	<li class="nav-item">
			<form role = "form" action = "login.php" method = "post">
			<button type="submit" name="logout"> Log Out</button>
		 	</form>
		 	</li>
		  </ul>
		</div>
	  </nav>
	';
?>

<?php
//create the sql statement
$sql = "SELECT * FROM user_table ORDER BY lastname ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo '    <h1 style="margin-top: 2em;margin-bottom: 1em;text-align: center;color: #0099ff
  "> Total Users: <b style=""">'.$result->num_rows.'</b> </h1>';
    echo '     <div class ="container" style="margin-bottm:10em">
    <h2 style="margin-top:2em;margin-left: 0.5em;"> Users</h2>';
    echo "<table class='table'>";
    echo '  <thead class="thead-dark">
            <tr>
              <th scope="col"> #</th>
              <th scope="col">Name  </th>
              <th scope="col">Email  </th>
              <th scope="col">Fine Due</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>';

//PRINT OUT ALL THE PRODUCT
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {

        // echo '<form method="post">';
        echo '<tr>';
        echo '<th scope="row">'.$count.'</th>';
        echo '<td>' . $row["firstname"] ." ". $row["lastname"]. '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["fine"] . '</td>';

        echo '<td> <button name="delete" type="submit">Edit</button></td>';
        echo '<td> <button name="delete" type="submit">Delete</button></td>';
        echo '</tr>';
        // echo '</form>';
        $count++;

    }
    echo "</table>
    </div>";

} else {
    echo '     <div class ="container">
  <h2 style="margin-top:4em; margin-left: 0.5em;"> Users</h2>';
    echo "<table class='table'>";
    echo '  <thead class="thead-dark">
          <tr>
            <th scope="col"> #</th>
            <th scope="col">Books</th>
            <th scope="col">Date Borrowed</th>
            <th scope="col">Return</th>
          </tr>
        </thead>';
    // echo '<form method="post">';
    echo '<tr>';
    echo '<th scope="row">'.$count.'</th>';
    echo '<td>' . $row["firstname"] . '</td>';
    echo '<td>' . $row["firstname"] . '</td>';
    echo '<td> <button name="remove" type="submit">Remove</button></td>';
    echo '</tr>';
    // echo '</form>';
}
$conn->close();

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['remove'])) {
    removeUsers();
}
function removeUsers()
{
    // do stuff
}
?>

<?php
echo '    <link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="footer" style="margin-top:11em;">
    <p id="copyright">Library Project 2019 &copy;</p>
    <ul id="footer-social-media">
        <li><a href="#" class="fa fa-facebook"></a></li>
        <li><a href="#" class="fa fa-twitter"></a></li>
        <li><a href="#" class="fa fa-linkedin"></a></li>
        <li><a href="#" class="fa fa-instagram"></a></li>
    </ul>
    <p id="lastupdate"> Last update: April 2019</p>

    <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Sitemap</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="admin.html">Admin</a></li>
    </ul>
</div>
'?>

</body>
</html>

</html>
