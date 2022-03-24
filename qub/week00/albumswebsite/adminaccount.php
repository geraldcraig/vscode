<?php
 
$endpoint = "http://localhost/qub/week00/albumsapi/api.php?user";
 
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
            <a class='nav-link' href='account.php'>Account</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='useraccounts.php'>User Accounts</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='addalbum.php'>Add Album</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='reviews.php'>Reviews</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
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
        <h1>User Accounts</h1>
        <table class="table striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Delete account</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {

                      $fname = $row['firstname'];
                      $lname = $row['lastname'];
                      $uname = $row['username'];
                      $pword = $row['userpassword'];
                      $userid = $row['id'];
                   
                        echo " <tr>  
                               <td>$fname</td>
                               <td>$lname</td>
                               <td>$uname</td>
                               <td>$pword</td>
                               <td><a href='album.php?album_id=$usedid' class='btn btn-info' role='button'>Delete</a></td>
                           </tr>  ";
                    }
                ?>
            </tbody>
        </table>



</body>
</html>
