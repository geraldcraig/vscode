<?php

    session_start();

    if (!isset($_SESSION['editpermission123'])) {

        header("Location: login.php");
        exit();

    } else {

        $currentUser = $_SESSION['editpermission123'];

        $planetid = $_GET["id"];

        include("dbconn.php");
      
        $query = "SELECT * FROM album WHERE id = {$planetid}";
      
        $result = $conn->query($query);
      
        if (!$result) {
          echo $conn->error;
        } else {
      
          // obtain the fields from the result set
          while ($row = $result->fetch_assoc()) {
              $planet = $row["title"];
              $description = $row["year"];
          }
        }
    }
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
        
            <span class="mif-spinner4 ani-spin black"> </span>  <span class="pl-2" >Solar Me</span>

        </a>

        <ul class="app-bar-menu">
            <?php
                echo "<li><a href='logout.php'>Logout</a></li>
                      <li><strong>Hello, $currentUser!</strong></li>";
            ?>
        </ul>
    </div>

    <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">

        <?php

            echo "<div><h2>Edit description for {$planet}</h2></div>
                <form method='POST' action='processedit.php'>
                <fieldset>
                <textarea data-role='textarea' data-clear-button='true' data-auto-size='true' data-max-height='200' name='newDesc'>$description</textarea>
                <input type='hidden' value='$planetid' name='id'>
                <input class='button yellow outline pl-10 pr-10 mt-10 place-right' type='submit' value='update'>
                <a class='button yellow outline pl-10 pr-10 mt-10 place-right' href='index.php'>cancel</a>
                </fieldset>
                </form>";     
        ?>

    </div>

    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
</body>
</html>
