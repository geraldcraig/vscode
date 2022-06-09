<?php

session_start();

if (!isset($_SESSION['user'])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['user'];
}

//$endpoint = "http://localhost/qub/week00/albumsapinew/api.php";

$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapinew/api.php";

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
    <a class="navbar-brand" href="index.php">Record Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav mr-auto'>
        <?php
        
        ?>
      </ul>

      <form class='form-inline' action='search.php'>
        <input class='form-control mr-sm-2' type='text' name='search' placeholder='Search'>
        <button class='btn btn-success' type='submit'>Search</button>
      </form>
    </div>

  </nav>
  <br>

  <div>
    <h1>Top 10 Most Played Albums</h1>
  </div>

  <div class="row row-cols-1 row-cols-md-5 g-4">

    <?php
    foreach ($data as $row) {

      $number = $row['number'];
      $album = $row['title'];
      $artist = $row['name'];
      $albumid = $row['id'];
      $artwork = $row['image'];

      echo "<a href='album.php?album_id=$albumid'>
          <div class='col'>
            <div class='card' style='width: 200px'>
                <img class='card-img-top' src=$artwork alt='Card Image' style='width: 100%'>
              <div class='card-body'>
								<h3>$album</h4>
								<h3>$artist</h4>
								<h4>$number</h4>
              </div>
					  </div>
          </div>
				</a>";
    }
    ?>

  </div>

</body>

</html>