<?php

include("conn.php");

$id= $_GET['id'];

$readartist = "SELECT * FROM BARTIST WHERE pk_artist_id = $id";
$result = $conn->query($readartist);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bio | Artist | B Festival </title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link rel="stylesheet" href="css/bio.css" type="text/css">
    
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

    <?php

      while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $intro = $row['intro'];
        $bio = $row['bio'];
        $url = $row['url'];
        $video = $row['video'];
        $img = $row['image'];
        $id = $row['pk_artist_id'];
  
      echo "<div class='container'>
              <a type='button' href='artist.php'class='btn btn-light text-uppercase'><i class='icon-left-open'></i>Back to Artist Line-Up</a>
              <div class='row'>
                <div class='col'>
                  <img src='img/$img'class='img-fluid w-100' alt=''>
                </div>
              </div>

              <div class='row'>
                <div class='col text-center'>
                  <h1 class='biotitle'>$name</h1>
                </div>
              </div>

              <div class='row'>
                <div class='col-sm-12 col-md-4 text-left'> 
                  <div class='accordion artist' id='accordionExample'>
                    <div class='card'>
                      <div class='card-header' id='headingOne'>
                        <h2 class='mb-0 titlefont'>Members</h2>
                      </div>

                      <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'>
                        <div class='card-body'>";

                        $readband = "SELECT * FROM BMEMBER INNER JOIN BINSTRUMENT ON fk_instrument_id = pk_instrument_id WHERE fk_artist_id = $id";
                        $result = $conn->query($readband);

                        while ($row = $result->fetch_assoc()) {
                          $instrument = $row['instrument'];
                          $member = $row['name'];

                          echo "<p class='banddeets'><strong>$instrument : </strong>$member</p>";
                        }
        
                  echo "</div>
                      </div>
                    </div>
                  </div>";
                  // col closing div
                
                  $readrelease = "SELECT * FROM BARTIST INNER JOIN BRELEASE ON fk_artist_id = pk_artist_id
                  INNER JOIN BGENRE ON fk_genre_id = pk_genre_id WHERE pk_artist_id = $id";
                  $result = $conn->query($readrelease);

                  while ($row = $result->fetch_assoc()) {
                    $img = $row['img'];
                    $released = $row['release_month'];
                    $releasey = $row['release_year'];
                    $title = $row['title'];
                    $genre = $row['genre'];

                      echo" <h1 class='titlefont releasetitle' style='width: 100%;'>Releases</h1>
                            
                              <div class='card release' style='width: 100%;'>
                                <img src='img/$img'class='card-img-top albums' alt='...'>
                                <div class='card-body'>
                                  <p class='card-text'><strong>Album :</strong> $title</p>
                                  <p class='card-text'><strong>Released :</strong> $released $releasey</p>
                                  <p class='card-text'><strong>Genre :</strong> $genre</p>
                                </div>
                              </div>
                            ";
                  }

                  echo "</div>
                          <div class='col-sm-12 col-md-8 text-left'>
                            <h1 class='titlefont releasetitle' style='width: 100%;'>Bio</h1>
                            <p class='biodeets'>$intro</p>
                            <p class='biodeets'>$bio</p>
                            <h1 class='titlefont releasetitle' style='width: 100%;'>Watch</h1>
                            <div class='videoWrapper'>
                              $video
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>";
                  }
    ?>


    <!-- footer -->
    <?php
      include("modules/footer.html");
    ?>

  </body>
</html>