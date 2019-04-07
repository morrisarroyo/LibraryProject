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
		  Library Application
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
			<li class="nav-item">
			  <a class="nav-link" href="user_list.php">Users</a>
			</li>

		  <li class="nav-item">
			<a class="nav-link" href="userbook_account.php">Borrowed</a>
      </li>
      <li class="nav-item">
			<a class="nav-link active" href="#">Search</a>
		  </li>
			<li class="nav-item" style="width:40em;">
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
<div>
    <h1 style="margin-top: 2em;margin-bottom: 1em;text-align: center;"> Search Books</h1>
    </div>
<div id="search_box" style="margin-top:2em;width: 36em; margin: 0 auto;">
    <form action="search_result.php" method="post">
        <select name="catgo"style="height:3em">
        <option value="title">Title</option>
            <option value="title">BookID</option>
            <option value="title">ISBN</option>
        </select>
        <input type="text" name="search" size="50" style="height:3em"/> 
        <button style="height:3em">Search</button>
    </form>
</div>
<div>
    <?php
require "databaseConstants.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// print "Success to connect<br>";

$search_conn = $_POST["search"];
$sql = "SELECT * FROM book WHERE title LIKE '%$search_conn%'";
// if (!$result){
//     die('Invalid query: ' . mysqli_error($s));
// }
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '    <h3 style="margin-top: 1em;margin-bottom: 1em;text-align: center;"><i> Keyword Searched: <b style=""">'.$search_conn.'</b></i> </h3>';
    echo '<h5  style="margin-top: 2em;margin-bottom: 1em;text-align: center;"> Found <b>'.$result->num_rows.'</b> matche(s) for <b>"'.$search_conn.'"</b>
    </h5>';
    echo '     <div class ="container"><h2 style="margin-top:2em; margin-left: 0.5em;"> </h2>';
    echo "<table class='table'>";
    echo '  <thead class="thead-dark">
                <tr>
                  <th scope="col"> BookID</t/h>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">ISBN</th>
                  <th scope="col">YEAR</th>
                </tr>
              </thead>';

    /* numeric array */
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $row["bookid"] . '</th>';
        echo '<td>' . $row["title"] . '</td>';
        echo '<td>' . $row["authorfirstname"] . " " . $row["authorlastname"] . '</td>';
        echo '<td>' . $row["isbn"] . '</td>';
        echo '<td>' . $row["year"] . '</td>';
        // echo '<td> <button name="return" type="submit">Return</button></td>';
        echo '</tr>';
        $count++;
    }
    echo "</table></div>";
} else {
    echo '<div>';
    echo '    <h3 style="margin-top: 1em;margin-bottom: 1em;text-align: center;"><i> Keyword Searched: <b style="   "">'.$search_conn.'</b></i> </h3>';
    echo '<h5  style="margin-top: 2em;margin-bottom: 1em;text-align: center;color:red"> Nothing found for <b>'.$search_conn.'</b></h5>';
    echo ' </div>';
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
' ?>

</div>
</body>
</html>