<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="images/home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Library Application
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
		
		<?php if (isset($_SESSION['login_user'])): ?>
        <li class="nav-item active">
          <a class="nav-link" href="#">My Account <span class="sr-only">(current)</span></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">Users</a>
        </li>
		<?php else: ?>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">My Account <span class="sr-only">(current)</span></a>
        </li>
		<?php  endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Search</a>
        </li>
		<?php if (isset($_SESSION['login_user'])): ?>
        <li> 
			<a style="color:blue;" class="nav-link" href"="#">
				<?php echo $_SESSION['login_user']; ?>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php">Log Out</a>
		 </li>
		<?php  endif; ?>
      </ul>
    </div>
  </nav>
</body>

</html>