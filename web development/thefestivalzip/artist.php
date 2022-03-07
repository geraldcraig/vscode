<?php

include("conn.php");

$read = "SELECT * FROM BARTIST";
$result = $conn->query($read);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artist | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    
    <!-- framework links and scripts -->
    <?php
      include("modules/framework.html")
    ?>

    <!-- jQuery scrips and animations -->
    <script src="scripts/script.js"></script>
    <script src='scripts/accordian.js'></script>

    <!-- navbar animation specific to each page -->
    <script>
      // navbar highlighted animation (this needs implemented on each page)
      $(function() {
        $("#artists").attr("class", "nav-item active");
        $("#artists a#homepress").html("Home<span class='sr-only'>(current)</span>");

        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").hover(function() {
          $("#contactus a").attr("class", "nav-link active");
        });

        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").mouseout(function() {
          $("#contactus a").attr("class", "nav-link");
        });
      });
    </script>

  </head>

  <body>
  
    <!-- include navbar -->
    <?php
      include("modules/navbar.php");
    ?>

    <div class="jumbotron" id="welcome">
      <?php
        echo "<div class='row'>";

        while($row = $result->fetch_assoc()) {
          $name = $row['name'];
          $intro = $row['intro'];
          $bio = $row['bio'];
          $url = $row['url'];
          $img = $row['image'];
          $id = $row['pk_artist_id'];

          echo "
          <div class='card mx-auto text-center col-xs-12 col-sm-artist col-md-artist col-lg-artist mt-3' style='width: 18rem;'>
            <a href='artistbio.php?id=$id' class=''><img src='img/$img'class='card-img-top artist' alt=''>
              <div class='card-block mx-auto'>
                <button type='button' class='btn btn-secondary-outline btn-lg btn-block text-uppercase'><h5 class='card-title'>$name</h5>
                </button>
              </div>
            </a>
          </div>";
        }

        echo"</div>";
      ?>
    </div>

    <!-- footer -->
    <?php
      include("modules/footer.html");
    ?>

  </body>
</html>