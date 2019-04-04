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
			<li class="nav-item active">
			  <a class="nav-link" href="user_list.php">Users</a>
			</li>

		  <li class="nav-item">
			<a class="nav-link" href="#">Search</a>
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
    <div class ="container">
    <h2 style="margin-top:1.5em; margin-left: 0.5em;"> List of Users</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Users</th>
      <th scope="col">Delete</th>
      <!-- <th scope="col">Date Borrowed</th> -->
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <th scope="row"> </th>
      <td></td>
      <td></td>
    </tr>

    <!-- <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>  -->
  </tbody>

</table>
</div>
<?php
$sql = "SELECT * FROM user_book WHERE userid = $_SESSION[userid]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <tbody>
        <tr>
          <th scope="row"></th>
          <td></td>
          <td></td>
          <td> ?> <a href="return.php"?id=<?php echo $row["id"];?> Return Book </a> <?php echo </td>
        </tr>

        <tr>
          <th scope="row"> </th>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <th scope="row"></th>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>';
    }
}

?>

</body>
</html>

</html>
<?php
include 'footer.php'
?>