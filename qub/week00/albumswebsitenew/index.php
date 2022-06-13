<?php


$endpoint = "http://localhost/qub/week00/albumsapinew/api.php";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapinew/api.php";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Album Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>

<body>

<nav class="navbar bg-secondary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Record Website</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
  <br>

  <div>
    <h1>Top 10 Most Listened To Albums</h1>
  </div>

  <div class="row row-cols-1 row-cols-md-5 g-4">

    <?php
    foreach ($data as $row) {

      $number = $row['number'];
      $album = $row['title'];
      $artist = $row['name'];
      $artwork = $row['image'];

      echo "
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