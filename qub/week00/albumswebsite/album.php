<?php

    $albumid = $_GET['album_id'];
 
    $endpoint = "http://localhost/qub/week00/albumsapi/api.php?album=$albumid";
 
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
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Record Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.php'>Log In</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='register.php'>Register</a>
          </li>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
  </div>
</nav>
<br>

<div class="container">
			<h1>Album Info</h1>
			<?php
				foreach ($data as $row) {

					$number = $row['number'];
          $artist = $row['name'];
					$year = $row['year'];
					$album = $row['title'];
					$albumid = $row['id'];
          $artwork = $row['image'];

					echo "<div><h1>Title: $album</h1></div>
                <div class='album'>
								<h2>Artist: $artist</h2>
								<h3>Year: $year</h3>
								<p>Genre: Genre</p>
                <p>Sub-Genre: Sub-Genre</p>
                <p>Add Rating: <a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Add Rating</a></p>
                <p>Add Review: <a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Add Review</a></p>
                <p>Add Album: <a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Add Album</a></p>
                <p>Update Album: <a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Update Album</a></p>
                <p>Delete Album: <a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Delete Album</a></p>
                <p><img src=$artwork><p>
                <p>Rating: Rating</p>
                <p>Reviews: Reviews</p>
							</div> ";
				}
			?>	

</body>
</html>
