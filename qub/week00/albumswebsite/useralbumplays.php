<?php

include ("dbconn.php");

$user = $_GET['user_name'];
$albumid = $_GET['album_id'];

$checkuser = "SELECT * FROM album_plays
WHERE album_plays.user_id IN (SELECT user.id FROM user WHERE username = '$user')
AND album_plays.album_id = '$albumid' ";

$result = $conn->query($checkuser);

if (!$result) {
    echo $conn->error;
}

$num = $result->num_rows;

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
       
          echo "<li class='nav-item'>
                  <a class='nav-link' href='account.php'>Account</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Log Out</a>
                </li>";
        
        ?>
       
      </ul>
      <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-3">
  <h1>Album Plays</h1>
  <table class="table table-secondary table-striped">
    <?php

    if ($num > 0) {

      echo "<thead>
              <tr>
                  <th>Number</th>
                  <th>Album</th>
                  <th>Artist</th>
                  <th>Year</th>
                 <th>Artwork</th>
                 <th>No. of Album Plays</th>
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
                  <td><a href='album.php?album_id=$albumid'><img src=$artwork class='img-thumbnail' style='width: 150px'></a></td>";
        }
    }
    
    ?>
  </table>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>