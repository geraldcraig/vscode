<?php

session_start();

if (!isset($_SESSION["editpermission123"])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['editpermission123'];
}
 
    $endpoint = "http://localhost/qub/week00/albumsapi/api.php";
 
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
      <?php
        if (!$showBtn) {
        echo "<li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='account.php'>Account</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.php'>Log In</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='register.php'>Register</a>
          </li>"; 
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='account.php'>Account</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='login.php'>Log In</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='logout.php'>Log Out</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='register.php'>Register</a>
        </li>"; 

        }
        ?>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
  </div>
</nav>
<br>

<div class="container">
        <h1>Top 500 Albums</h1>
        <table class="table striped">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Year</th>
                    <th>Rating</th>
                    <th>Owned</th>
                    <th>Favourite</th>
                    <th>Artwork</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {

                      $number = $row['number'];
                      $year = $row['year'];
                      $artist = $row['name'];
                      $title = $row['title'];
                      $albumid = $row['id'];
                      $artwork = $row['image'];
                   
                        echo " <tr>  
                               <td>{$row['number']}</td>
                               <td>$title</td>
                               <td>$artist</td>
                               <td>{$row['year']}</td>
                               <td>Rating</td>
                               <td><a href='album.php?album_id=$albumid' class='btn btn-info' role='button'>Owned</a></td>
                               <td><a href='addfavourite.php?album_id=$albumid' class='btn btn-info' role='button'>Favourite</a></td>
                               <td><a href='album.php?album_id=$albumid'><img src=$artwork class='img-thumbnail' style='width: 150px'></a></td>
                           </tr>  ";
                    }
                ?>
            </tbody>
        </table>
        <p>Default:</p>
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
    </div>

</body>
</html>
