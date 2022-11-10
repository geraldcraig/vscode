<?php

session_start();

if (!isset($_SESSION['user'])) {
  $showBtn =false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['user'];
}

$albumid = $_GET['album_id'];

//$endpoint = "http://localhost/qub/40278046/albumsapi/api.php?album=$albumid";

$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?album=$albumid";

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
    <a class="navbar-brand" href="index.php">Record Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="albumlist.php">Top 500 Albums</a>
        </li>
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
                  <a class='nav-link' href='account.php'>Account</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Log Out</a>
                </li>";
        }
        ?>
       
      </ul>
      <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid mt-3">
    <div class="row">
      <div class="col m8">
        <h1>Album Info</h1>
        <?php
          foreach ($data as $row) {

            $album = $row['title'];
            $artist = $row['name'];
            $year = $row['year'];
            $genre = $row['genre'];
            $subgenre = $row['subgenre'];
            $albumid = $row['id'];

            echo "<div>
                    <h1>Title: $album</h1>
                    <h1>Artist: $artist</h1>
                    <h1>Genre: $genre</h1>
                    <h1>Sub-Genre: $subgenre</h1>
                  </div>";
          }
        ?>
      </div>

      <div class="col m4">
        <?php
          foreach ($data as $row) {

            $artwork = $row['image'];

            echo "<div>
                    <p><img src='$artwork'></p>
                  </div>";
          }
        ?>
      </div>
    </div>
</div>

<div>
  <h1>Album and Artist Info</h1>
</div>

<div>
<h1>Rating and Reviews</h1>
</div>	

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>