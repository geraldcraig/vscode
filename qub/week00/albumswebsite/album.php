<?php

session_start();

if (!isset($_SESSION['user'])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['user'];
}

$albumid = $_GET['album_id'];

$endpoint = "http://localhost/qub/week00/albumsapi/api.php?album=$albumid";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?album=$albumid";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);



$reviewendpoint = "http://localhost/qub/week00/albumsapi/api.php?album_id=$albumid";

//$reviewendpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?album=$albumid";

$viewresult = file_get_contents($reviewendpoint);

$viewdata = json_decode($viewresult, true);

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
        if (!$showBtn) {
          echo "<li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>Browse By</a>
            <div class='dropdown-menu'>
              <a class='dropdown-item' href='browseartist.php'>Artist</a>
              <a class='dropdown-item' href='browseyear.php'>Year</a>
             <a class='dropdown-item' href='browsegenre.php'>Genre</a>
            </div>
          </li>
          <li class='nav-item'>
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
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>Browse By</a>
            <div class='dropdown-menu'>
              <a class='dropdown-item' href='browseartist.php'>Artist</a>
              <a class='dropdown-item' href='browseyear.php'>Year</a>
             <a class='dropdown-item' href='browsegenre.php'>Genre</a>
            </div>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='account.php'>Account</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>";
        }
        ?>
      </ul>

      <form class='form-inline' action='search.php'>
        <input class='form-control mr-sm-2' type='text' name='search' placeholder='Search'>
        <button class='btn btn-success' type='submit'>Search</button>
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
      $user = $row['username'];
      $genre = $row['genre_type'];
      $subgenre = $row['subgenre_type'];

      echo "<div><h1>Title: $album</h1></div>
                <div class='album'>
								<h2>Artist: $artist</h2>
								<h3>Year: $year</h3>
								<p>Genre: $genre</p>
                <p>Sub-Genre: $subgenre</p>
                <p><img src=$artwork><p>
							</div> ";
    }
    ?>
  </div>

  <div class="container">
    <h1>Reviews</h1>
    <table class="table striped">
      <?php
      echo "<thead>
                <tr>
                    <th>Rating</th>
                    <th>Username</th>
                    <th>Review</th>
                </tr>
            </thead>";
      foreach ($viewdata as $row) {

        $rating = $row['rating'];
        $review = $row['review'];
        $user = $row['username'];

        echo "<tr>
                    <td>$rating</td>
                    <td>$user</td>
                    <td>$review</td>
                    </tr>";
      }
      ?>
    </table>
  </div>

</body>

</html>