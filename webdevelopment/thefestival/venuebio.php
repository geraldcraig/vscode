<?php

include("conn.php");

$id= $_GET['id'];

$readvenue = "SELECT * FROM BVENUE 
INNER JOIN BADDRESS ON pk_address_id = fk_address_id WHERE pk_venue_id = $id";
$readvenueprocess = $conn->query($readvenue);


?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Venue | B Festival </title>
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

      while($row = $readvenueprocess->fetch_assoc()) {
        $name = $row['venue_name'];
        $intro = $row['venue_title'];
        $bio = $row['venue_description'];
        $address = $row['street'];
        $img = $row['venue_image'];
        $id = $row['pk_venue_id'];
  
      echo "<div class='container'>
      <a href='index.php'><button type='button' class='btn btn-outline-secondary text-uppercase mt-4 mb-4'>
      <i class='icon-left-open'></i>Back to Homepage</button></a>
              <div class='row'>
                <div class='col'>
                  <img src='img/$img'class='img-fluid w-100' alt=''>
                </div>
              </div>

              <div class='row'>
                <div class='col text-center'>
                  <h1 class='biotitle text-break'>$name</h1>
                </div>
              </div>

              <div class='row'>
                <div class='col-sm-12 col-md-4 text-left'> 
                  <div class='accordion artist' id='accordionExample'>
                    <div class='card'>
                      <div class='card-header' id='headingOne'>
                        <h2 class='mb-0 titlefont text-center'>Location</h2>
                      </div>

                      <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'>
                        <div class='card-body'>";

                        $readlocation = "SELECT * FROM BVENUE
                        INNER JOIN BADDRESS ON fk_address_id = pk_address_id WHERE pk_venue_id = $id";
                        $result = $conn->query($readlocation);

                        while ($row = $result->fetch_assoc()) {
                           
                            $bio = $row['venue_description'];
                            $address = $row['street'];
                            $city = $row['city'];
                            $postcode = $row['postcode'];
                            $map = $row['embed_google_map'];

                          echo "<p class='banddeets text-center'><strong>$address</strong></p>
                                <p class='banddeets text-center'>$city</p>
                                <p class='banddeets text-center'>$postcode</p>";
                        }
        
                  echo "</div>
                      </div>
                    </div>
                    </div>
                    <div class='embed-responsive embed-responsive-1by1 mt-3 mb-3'>
                    $map
                    </div>
                  ";
                  // col closing div
                
                  

                  echo "</div>
                          <div class='col-sm-12 col-md-8 text-left'>
                            <h1 class='titlefont releasetitle text-center' style='width: 100%;'>$intro</h1>
                            <p class='biodeets'>$bio</p>
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