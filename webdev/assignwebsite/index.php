<?php

  session_start();

  if (!isset($_SESSION["editpermission123"])) {
    $showBtn = false;
  } else {
    $showBtn = true;
    $currentUser = $_SESSION['editpermission123'];
  }

  $endpoint = "http://localhost/webdev/assignapi/api.php";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource,true);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="solar.css">
</head>

<body class=" h-vh-100 bg-dark">
  <div data-role="appbar" data-expand-point="md" class="bg-crimson fg-gray">

		<ul class="app-bar-menu">
        <?php
          if (!$showBtn) {
            echo "<li><a href='index.php'>Homepage</a></li>
                  <li><a href='albumlist.php'>Top 500</a></li>
                  <li><a href='search.php'>Search</a></li>
                  <li><a href='login.php'>Log In</a></li>
                  <li><a href='register.php'>Register</a></li>";
          } else {
            echo "<li><a href='index.php'>Homepage</a></li>
                  <li><a href='albumlist.php'>Top 500</a></li>
                  <li><a href='search.php'>Search</a></li>
                  <li><a href='account.php'>Account</a></li>
                  <li><a href='logout.php'>Log Out</a></li>";
          }
        ?>
			</ul>
    </div>

  <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">
    <h2>Planets</h2>
    <?php
          foreach ($data as $row) {

            echo "<div class=' bg-crimson fg-white p-1 mb-2 p-3-md p-5-lg p-8-xl text-center'>
                        <a class='button yellow outline pl-10 pr-10' href='album.php?item={$row["id"]}'>{$row["name"]}</a>
                </div> ";
          }
    ?>
  </div>
  
  <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
</body>
</html>
