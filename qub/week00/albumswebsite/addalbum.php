<?php

session_start();

if (!isset($_SESSION["editpermission123"])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['editpermission123'];
}
 
$endpoint = "http://localhost/qub/week00/albumsapi/api.php?user";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Album Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="adminaccount.php">Admin Account</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
              <?php
              if (!$showBtn) {
           echo "<li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.php'>Log In</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='register.php'>Register</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='adminlogin.php'>Admin</a>
          </li>"; } else {
            echo "<li class='nav-item'>
            <a class='nav-link' href='editalbums.php'>Edit Albums</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='addalbum.php'>Add Album</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='editaccounts.php'>Edit Accounts</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='editreviews.php'>Edit Reviews</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>";
          }
          ?>
        </ul>
        </div>
  
</nav>
<br>

<div class="container">
  <h2>Add Album</h2>
	<form name="mylist" method="POST" action="processaddalbum.php" enctype="multipart/form-data">
    <div class="form-group">
			<label for="number">Number:</label> 
			<input type="text" id="number" name="number"/>
    </div>

    <div class="form-group">
			<label for="title">Title:</label> 
			<input type="text" id="title" name="title"/>
		</div>

    <div class="form-group">
			<label for="image">Image:</label> 
			<input type="text" id="image" name="image"/>
		</div>

    <div class="form-group">
			<label for="genre">Genre:</label> 
			<input type="text" id="genre" name="genre"/>
		</div>

    <div class="form-group">
			<label for="subgenre">Sub-Genre:</label> 
			<input type="text" id="sungenre" name="subgenre"/>
		</div>

	<div class="form-group">
			<label for="artist">Artist:</label> 
			<input type="text" id="artist" name="artist"/>
		</div>

		<div class="form-group">
			<label for="year">Year:</label> 
			<input type="text" id="year" name="year"/>
		</div>
						
			<button type="submit" class="btn btn-primary">Submit</button>			
  </form>
</div>
	

</body>
</html>
