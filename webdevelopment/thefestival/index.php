<?php

include("conn.php");

$readnews = "SELECT * FROM BNEWS";
$result = $conn->query($readnews);

$readwelcome = "SELECT * FROM BFESTIVAL";
$welcomeresult = $conn->query($readwelcome);

$readvenue = "SELECT * FROM BVENUE 
INNER JOIN BADDRESS ON pk_address_id = fk_address_id";
$readvenueprocess = $conn->query($readvenue);

$readheadliners = "SELECT * FROM BARTIST
INNER JOIN BPERFORMANCE ON BARTIST.fk_performance_id = BPERFORMANCE.pk_performance_id
INNER JOIN BDATE ON BPERFORMANCE.fk_date_id = BDATE.pk_date_id
INNER JOIN BTIME ON BPERFORMANCE.fk_time_id = BTIME.pk_time_id
INNER JOIN BVENUE ON BPERFORMANCE.fk_venue_id = BVENUE.pk_venue_id
WHERE BTIME.isheadline = 1";
$readheadlinersprocess = $conn->query($readheadliners);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    
    <!-- framework links and scripts -->
    <?php
      include("modules/framework.html")
    ?>

    <!-- jQuery scrips and animations -->
    <script src="scripts/script.js"></script>
    
    <!-- navbar animation specific to each page -->
    <script>
      // navbar highlighted animation (this needs implemented on each page)
      $(function() {
        $("#home").attr("class", "nav-item active");
        $("#home a#homepress").html("Home<span class='sr-only'>(current)</span>");

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
  
    <!-- hero -->
    <div class="hero herofont">
      <div class="hero-inner">
        <img src="img/herologo.png" id="heroimg" class="img-fluid w-50 h-50">
        <img src="img/BFestivalDate.png" id="heroimg" class="img-fluid w-50 h-50">
        <a href="https://www.ticketmaster.ie/"><img src="img/BFestivalTickets.png" id="heroimg" class="img-fluid w-50 h-50"></a>
        <a href="lineup.php"><img src="img/BFestivalLineUp.png" id="heroimg" class="img-fluid w-50 h-50"></a>
      </div>
    </div>

    <!-- include navbar -->
    <?php
      include("modules/navbarhome.php");
    ?>

    <!-- hompage welcome -->
    <div class="jumbotron" id="welcome">
      <div class="row">
        <div class="col-12">

          <?php
            while($row = $welcomeresult->fetch_assoc()) {
              $fest_title = $row['fest_pagetitle'];
              $fest_name = $row['fest_name'];
              $fest_description = $row['fest_description'];

              echo "<h1 class='display-4 text-center font-weight-light titlefont'>$fest_title $fest_name!</h1>
                    <hr>
                    <div class='div'>$fest_description</div>
                    <hr>";
            }

        
        echo "
        <h1 class='display-4 text-center font-weight-light titlefont'>Venues</h1>
        <div class='row'>";

        while($row = $readvenueprocess->fetch_assoc()) {
          $name = $row['venue_name'];
          $intro = $row['venue_title'];
          $bio = $row['venue_description'];
          $address = $row['street'];
          $img = $row['venue_image'];
          $id = $row['pk_venue_id'];

          echo "
          <div class='card mx-auto text-center p-0 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3' style='width: 18rem;'>
            <a href='venuebio.php?id=$id' class='artist'><img src='img/$img'class='card-img-top venue' alt=''>
              <div class='card-block mx-auto'>
                <button type='button' class='btn btn-secondary-outline btn-lg btn-block text-uppercase'><h5 class='card-title'>$name</h5>
                </button>
              </div>
            </a>
          </div>";
        }

        echo"
        </div>
        <hr>";

        echo "
        <h1 class='display-4 text-center font-weight-light titlefont'>Headline Acts</h1>
        <div class='row'>";

        while($row = $readheadlinersprocess->fetch_assoc()) {
          $name = $row['name'];
          $img = $row['image'];
          $id = $row['pk_artist_id'];

          echo "
          <div class='card mx-auto text-center col-xs-12 col-sm-artist col-md-artist col-lg-artist mt-3' style='width: 18rem;'>
            <a href='artistbio.php?id=$id' class='venue'><img src='img/$img'class='card-img-top artist' alt=''>
              <div class='card-block mx-auto'>
                <button type='button' class='btn btn-secondary-outline btn-lg btn-block text-uppercase'><h5 class='card-title'>$name</h5>
                </button>
              </div>
            </a>
          </div>";
        }

        echo"
        </div>
        <hr>";
      ?>
      



        <div data-spy="scroll" data-target="#nav-link" data-offset="0" class="container" id="news">
          <div class="row" id="newsicon">
            <div class="col-12 text-center">
              <i class="icon-newspaper text-center"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- homepage news -->
    <div class="container newsstand overflow-auto">
      <div class='row'>
            
      <?php

        $read = "SELECT * FROM BNEWS ORDER BY created";
        $result = $conn->query($read);

        while($row = $result->fetch_assoc()) {
          $newsid = $row['news_id'];
          $type = $row['type'];
          $title = $row['title'];
          $content = $row['content'];
          $url = $row['url'];
          $date = $row['created'];

          // newscards
          echo "<div class='card mx-auto text-center col-xs-12 col-sm-artist col-md-artist col-lg-artist mt-5' style='width: 18rem;'>
                  <div class='card-header'>
                    $type
                    <small class='text-muted'>Last updated: $date</small>
                  </div>
                  <div class='card-body' id='newscards'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$content.</p>
                  </div>
                  <div class='card-footer'><a href='$url' class='btn btn-outline-info justify-content-end'>See More</a></div>
                  </div>";
        }
      ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php
      include("modules/footer.html");
    ?>

  </body>
</html>