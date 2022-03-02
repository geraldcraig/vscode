<?php

  session_start();

  if (!isset($_SESSION["editpermission123"])) {
    $showBtn = false;
  } else {
    $showBtn = true;
    $currentUser = $_SESSION['editpermission123'];
  }

  $endpoint = "http://localhost/webdev/week10/solarsystemapi/api.php?system";

  $resource = file_get_contents($endpoint);

  $data = json_decode($resource, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="solar.css">
</head>

<body class=" h-vh-100 bg-dark">
  <div data-role="appbar" data-expand-point="md" class="bg-crimson fg-gray">
      <a href="#" class="brand no-hover">
            <span class="mif-spinner4 ani-spin black"> </span>  <span class="pl-2">Solar Me</span>
      </a>

      <ul class="app-bar-menu">
          <?php
            if (!$showBtn) {
              echo "<li><a href='login.php'>Login</a></li>";
            } else {
              echo "<li><a href='logout.php'>Logout</a></li>
                    <li><strong>Hello, $currentUser!</strong></li>";
            }
          ?>
      </ul>
  </div>

  <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">
    <h2>Planets</h2>
    <?php
          foreach ($data as $row) {

            echo "<div class=' bg-crimson fg-white p-1 mb-2 p-3-md p-5-lg p-8-xl text-center'>
                        <a class='button yellow outline pl-10 pr-10' href='planet.php?info={$row["id"]}'>{$row["name"]}</a>
                </div> ";
          }
    ?>
  </div>
  
  <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>

</body>
</html>