<?php

include ("dbconn.php");

$read = "SELECT album.id, album.number, album.title, artist.name, year.year, genre.genre, subgenre.subgenre, image.image FROM album
INNER JOIN artist
ON album.artist_id = artist.id
INNER JOIN year
ON album.year_id = year.id
INNER JOIN image
ON album.image_id = image.id
INNER JOIN album_genre
ON album.id = album_genre.album_id
INNER JOIN genre
ON album_genre.genre_id = genre.id
INNER JOIN album_subgenre
ON album.id = album_subgenre.album_id
INNER JOIN subgenre
ON album_subgenre.subgenre_id = subgenre.id
ORDER BY album.number
LIMIT 50";

$result = $conn->query($read);

if (!$result) {
    echo $conn -> error;
}
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
    <h1>Top 500 Albums</h1>
    <table class="table striped">
      <?php
      
        echo "<thead>
                <tr>
                    <th>Number</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Year</th>
                    <th>Artwork</th>
                    <th>Add Play</th>
                </tr>
            </thead>";
        while ($row = $result->fetch_assoc()) {

          $number = $row['number'];
          $album = $row['title'];
          $artist = $row['name'];
          $year = $row['year'];
          $artwork = $row['image'];
          $albumid = $row['id'];

          echo "<tr>
                    <td>$number</td>
                    <td>$album</td>
                    <td>$artist</td>
                    <td>$year</td>
                    <td><a href='album.php?album_id=$albumid'><img src=$artwork class='img-thumbnail' style='width: 150px'></a></td>
                    <td><a href='albumplays.php?album_id=$albumid&user_name=$currentuser' class='btn btn-info' role='button'>Add Play</a></td>
        
                    </tr>";
      }
        
      
      ?>
    </table>

</body>

</html>