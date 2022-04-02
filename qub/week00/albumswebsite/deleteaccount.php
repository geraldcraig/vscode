<?php

session_start();

if (!isset($_SESSION['admin'])) {
  $showBtn = false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['admin'];
}

$userid =$_GET['user'];
 
$endpoint = "http://localhost/qub/week00/albumsapi/api.php?deleteuser=$userid";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?userid=$userid";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);

//include('dbconn.php');

       // $userid = $conn->real_escape_string($_GET['user']);
    
       // $insertquery="DELETE FROM user WHERE id = $userid";
           
       // $result = $conn->query($insertquery);
        
       // if(!$result) {
            
            //echo $conn->error;
        
       // } else {

           // echo "Delete request performed";
            
       // }
 
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

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
              <?php
              if (!$showBtn) {
           echo "<li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.php'>Log In</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='register.php'>Register</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='adminlogin.php'>Admin</a>
          </li>"; } else {
            echo "<li class='nav-item'>
            <a class='nav-link' href='editalbums.php'>Edit Albums</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='addalbum.php'>Add Album</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='editaccounts.php'>Edit Accounts</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='editreviews.php'>Edit Reviews</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='adminlogout.php'>Log Out</a>
          </li>";
          }
          ?>
        </ul>
        </div>
</nav>
<br>
</body>
</head>