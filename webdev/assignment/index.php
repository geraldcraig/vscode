<?php

session_start();

if (!isset($_SESSION["editpermission123"])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['editpermission123'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body> 

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Record Collection Website</h1>
    <p>Website for Top 500 albums.<p>
  </div>

		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-link" href="top500.php">Top 500</a></li>
				<li class="nav-item"><a class="nav-link" href="favourite.php">Favourite</a></li>
				<li class="nav-item"><a class="nav-link" href="owned.php">Owned</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
			</ul>
		</nav>


<div class="container-fluid">
  <h3>Top 10 User Rated Albums</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
  <p>The navbar-expand-xl|lg|md|sm class determines when the navbar should stack vertically (on extra large, large, medium or small screens).</p>
</div>
</div>
	

</body>
</html>
