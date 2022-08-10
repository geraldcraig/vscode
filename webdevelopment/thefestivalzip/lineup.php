<?php

include("conn.php");

$read = "SELECT * FROM date";
$result = $conn->query($read);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Line-Up | B Festival</title>
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
        $("#lineup").attr("class", "nav-item active");
        $("#lineup a#homepress").html("Home<span class='sr-only'>(current)</span>");

        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").hover(function() {
          $("#contactus a").attr("class", "nav-link active");
        });

        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").mouseout(function() {
          $("#contactus a").attr("class", "nav-link");
        });
      });

      jQuery(document).ready(function($) {
        $('*[data-href]').on('click', function() {
            window.location = $(this).data("href");
        });
      });
    </script>

  </head>

  <body>
  
    <!-- include navbar -->
    <?php
      include("modules/navbar.php");
    ?>

    <div class="title">
      <h1 class='biotitle text-center'>schedule</h1>
    </div>
    
      <div class="dateselect col-3 text-center">
        <select name="forma" onchange="location = this.value;">
          <option value="lineup.php">List by time</option>
          <option value="lineupvv.php">List by Venue</option>
        </select>
    </div>

    <div class="container lineup">
      <div class="accordion" id="accordionExample">

        <!-- accordian section 1 (Friday) -->
        <div class="card">
          <div class="card-header titlefont" id="headingOne">
            <h2 class="mb-0">
              <?php
                $read = "SELECT * FROM date WHERE date_id = 1";
                $result = $conn->query($read);
                while($row = $result->fetch_assoc()) {
                  $date = $row['date'];
                
                  $day = date('l', strtotime($date));
                  $dayth = date('j', strtotime($date));
                  $days = date('S', strtotime($date));
                  echo "$day $dayth $days";
                }
              ?>
                <div class="float-right">
                  <button class="btn btn-link" id="h1drop" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="icon-up-open" id="arrow1"></i>
                  </button>
                </div>
            </h2>
          </div>
    
        <!-- section 1 content (Friday content/lineup) -->
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="row">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Time Slot</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Venue</th> 
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $friday = "SELECT * FROM BPERFORMANCE 
                    INNER JOIN BTIME ON fk_time_id = pk_time_id
                    INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                    INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                    INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                    WHERE fk_date_id = 400 ORDER BY start_time DESC";

                    $fridayquery = $conn->query($friday);

                    while ($row = $fridayquery->fetch_assoc()) {
                      $start = $row['start_time'];
                      $startdisp = date('g:ia', strtotime("$start"));
                      $end = $row['end_time'];
                      $enddisp = date('g:ia', strtotime("$end"));
                      $artist = $row['name'];
                      $venue = $row['venue_name'];
                      $location = $row['street'];
                      $id = $row['pk_artist_id'];
                      
                      echo "<tr data-href='artistbio.php?id=$id'>
                              <td scope='row'>$startdisp - $enddisp</td>
                              <td>$artist</td>
                              <td>$venue</td>
                            </tr>";
                    }
                  ?>  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- accordian section 2 (Saturday) -->
      <div class="card">
        <div class="card-header titlefont" id="headingTwo">
          <h2 class="mb-0">
            <?php
              $read = "SELECT * FROM date WHERE date_id = 2";
              $result = $conn->query($read);
              while($row = $result->fetch_assoc()) {
                $date = $row['date'];
            
                $day = date('l', strtotime($date));
                $dayth = date('j', strtotime($date));
                $days = date('S', strtotime($date));
                echo "$day $dayth $days";
              }
            ?>
              <div class="float-right">
                <button class="btn btn-link" id="h2drop" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="icon-down-open" id="arrow2"></i>
                </button>
              </div>
          </h2>
        </div>

        <!-- section 2 content (Saturday content/lineup) -->
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Time Slot</th>
                      <th scope="col">Artist</th>
                      <th scope="col">Venue</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $friday = "SELECT * FROM BPERFORMANCE 
                      INNER JOIN BTIME ON fk_time_id = pk_time_id
                      INNER JOIN BARTIST ON pk_performance_id = fk_performance_id                                   
                      INNER JOIN BVENUE ON fk_venue_id = pk_venue_id                                    
                      INNER JOIN BADDRESS ON pk_address_id = fk_address_id               
                      WHERE fk_date_id = 401 ORDER BY start_time DESC";

                      $fridayquery = $conn->query($friday);

                      while ($row = $fridayquery->fetch_assoc()) {
                        $start = $row['start_time'];
                        $startdisp = date('g:ia', strtotime("$start"));
                        $end = $row['end_time'];
                        $enddisp = date('g:ia', strtotime("$end"));
                        $artist = $row['name'];
                        $venue = $row['venue_name'];
                        $location = $row['street'];
                        $id = $row['pk_artist_id'];
                        
                        echo "<tr data-href='artistbio.php?id=$id'>
                                <td scope='row'>$startdisp - $enddisp</td>
                                <td>$artist</td>
                                <td>$venue</td>
                              </tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      

        <!-- accordian section 3 (Sunday) -->
        <div class="card">
          <div class="card-header titlefont" id="headingThree">
            <h2 class="mb-0"> 
              <?php
                $read = "SELECT * FROM date WHERE date_id = 3";
                $result = $conn->query($read);

                while($row = $result->fetch_assoc()) {
                  $date = $row['date'];
            
                  $day = date('l', strtotime($date));
                  $dayth = date('j', strtotime($date));
                  $days = date('S', strtotime($date));
                  echo "$day $dayth $days";
                }
              ?>
                <div class="float-right">
                  <button class="btn btn-link" id="h3drop" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="icon-down-open" id="arrow3"></i>
                  </button>
                </div>
            </h2>
          </div>

          <!-- section 3 content (Sunday content/lineup) -->
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Time Slot</th>
                      <th scope="col">Artist</th>
                      <th scope="col">Venue</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $friday = "SELECT * FROM BPERFORMANCE 
                      INNER JOIN BTIME ON fk_time_id = pk_time_id                  
                      INNER JOIN BARTIST ON pk_performance_id = fk_performance_id                                   
                      INNER JOIN BVENUE ON fk_venue_id = pk_venue_id                                    
                      INNER JOIN BADDRESS ON pk_address_id = fk_address_id                                   
                      WHERE fk_date_id = 402 ORDER BY start_time DESC";

                      $fridayquery = $conn->query($friday);

                      while ($row = $fridayquery->fetch_assoc()) {
                        $start = $row['start_time'];
                        $startdisp = date('g:ia', strtotime("$start"));
                        $end = $row['end_time'];
                        $enddisp = date('g:ia', strtotime("$end"));
                        $artist = $row['name'];
                        $venue = $row['venue_name'];
                        $location = $row['street'];
                        $id = $row['pk_artist_id'];
                        
                        echo "<tr data-href='artistbio.php?id=$id'>
                                <td scope='row'>$startdisp - $enddisp</td>
                                <td>$artist</td>
                                <td>$venue</td>
                              </tr>";
                      }
                    ?> 
                  </tbody>
                </table>
              </div>
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