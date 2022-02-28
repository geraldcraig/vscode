<?php

  session_start();

  if (!isset($_SESSION["editpermission123"])) {
    $showBtn = false;
  } else {
    $showBtn = true;
    $currentUser = $_SESSION['editpermission123'];
  }

  $endpoint = "http://localhost/webdev/assignapi/api.php";

  $resource = file_get_contents($endpoint);

  $data = json_decode($resource,true);

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
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
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
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
        <li class="nav-item"><a class="nav-link" href="albumslist.php">Top 500</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
			</ul>
		</nav>

<div class="container">
  <h2>Top 10 User Rated Albums</h2>
  <div class="card">
    <div class="card-body">


  <?php
      foreach($data as $row) {

        $album = $row['title'];
        $year = $row['year'];

        echo "<a href='album.php?album_id=$albumid'>
                <div class='box'>
                    <h3>$album</h3>
                    <h4>$year</h4>
                </div>
              </a>";
      }

  ?>
  </div>


</div>
	

</body>
</html>
