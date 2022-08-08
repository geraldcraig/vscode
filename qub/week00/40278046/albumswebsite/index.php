<?php

session_start();

if (!isset($_SESSION['user'])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentuser = $_SESSION['user'];
}

//$endpoint = "http://localhost/qub/week00/albumsapi/api.php?topten";

$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?topten";

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

<div>
  <h1>Top 10 Most Listened To Albums</h1>
</div>

  <div class="row row-cols-1 row-cols-md-5 g-4">

    <?php
    foreach ($data as $row) {

      $played = $row['SUM(plays)'];
      $album = $row['title'];
      $artist = $row['name'];
      $artwork = $row['image'];
      $albumid = $row['id'];
      

      echo "<div class='col'>
              <div class='card' style='width: 200px'>
                <a href='album.php?album_id=$albumid'><img class='card-img-top' src=$artwork alt='Card Image' style='width: 100%'></a>
                <div class='card-body'>
								  <h3>$album</h4>
								  <h3>$artist</h4>
								  <h4>No. of Plays: $played</h4>
                </div>
					    </div>
            </div>";
    }
    ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>