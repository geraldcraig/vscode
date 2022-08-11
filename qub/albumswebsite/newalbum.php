<?php

session_start();

if (!isset($_SESSION['admin'])) {
  $showBtn =false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['admin'];
}

$endpoint = "http://localhost/qub/albumsapi/api.php?user";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?user";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Record Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="adminaccount.php">Admin Account</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        if (!$showBtn) {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='login.php'>Log In</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='register.php'>Register</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='adminlogin.php'>Admin</a>
                </li>";
        } else {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='editaccounts.php'>Edit Accounts</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='newalbum.php'>Add New Album</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='adminlogout.php'>Admin Log Out</a>
                </li>";
        }
        ?>
</nav>

<div class="container mt-3 bg-secondary">
  <h2>Add New Album</h2>
	<form name="mylist" method="POST" action="processnewalbum.php" enctype="multipart/form-data">
    <div class="form-group">
			<label for="number">Number:</label> 
			<input type="text" id="number" name="number" required/>
    </div>

		<div class="form-group">
			<label for="title">Title:</label> 
			<input type="text" id="title" name="title" required/>
		</div>

    <div class="form-group">
			<label for="artist">Artist:</label> 
			<input type="text" id="artist" name="artist" required/>
		</div>

    <div class="form-group">
			<label for="genre">Genre:</label> 
			<input type="text" id="genre" name="genre" required/>
		</div>

    <div class="form-group">
			<label for="subgenre">Subgenre:</label> 
			<input type="text" id="subgenre" name="subgenre" required/>
		</div>

    <div class="form-group">
			<label for="year">Year:</label> 
			<input type="text" id="year" name="year" required/>
		</div>

    <div class="form-group">
			<label for="image">Image:</label> 
			<input type="text" id="image" name="image" required/>
		</div>

    <button type="submit" class="btn btn-primary">Submit</button>	
  </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>