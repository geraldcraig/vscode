<?php

  session_start();

  if (!isset($_SESSION["editpermission123"])) {
    $showBtn = false;
  } else {
    $showBtn = true;
    $currentUser = $_SESSION['editpermission123'];
  }

  $id = $_GET['info'];

  $endpoint = "http://localhost/webdev/week10/solarsystemapi/api.php?id=$id";

  $resource = file_get_contents($endpoint);

  $data = json_decode($resource, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="solar.css">
</head>

<body class=" h-vh-100 bg-dark">
  <div data-role="appbar" data-expand-point="md" class="bg-crimson fg-gray">
    <a href="#" class="brand no-hover">
           <span class="mif-spinner4 ani-spin black"> </span>  <span class="pl-2" >Solar Me</span>
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
    <?php
      if (!$result) {
        echo $conn->error;
      } else {

        foreach ($data as $row) {

          $search = $row["name"];

          // fix the search string for Mercury (e.g. Mercury (planet))
          if ($search == "Mercury") {
            $search = "Mercury%20(planet)";
          }

          $endp = "https://en.wikipedia.org/w/api.php?action=query&titles={$search}&prop=pageimages&pithumbsize=400&format=json&formatversion=2";

          $jsonres = file_get_contents($endp);

          $img = json_decode($jsonres, true);

          $path = $img["query"]["pages"][0]["thumbnail"]["source"];

          echo "<h2>{$row["name"]}</h2>
                <div class=' bg-crimson fg-white p-1 mb-2 p-3-md p-5-lg p-8-xl'>
              <h4>
              {$row["description"]}
              </h4>
              </div> ";

          echo "<img src='$path'>";
        }
      }

      if ($showBtn) {
        echo "<a class='button yellow outline pl-10 pr-10 place-right' href='edit.php?id={$planetid}'>edit</a>";
      }
    ?>

    <a class='button yellow outline pl-10 pr-10 place-right' href='index.php'>back</a>

  </div>
  
  <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
  
</body>
</html>