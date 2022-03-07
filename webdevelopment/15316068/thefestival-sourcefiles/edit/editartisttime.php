<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include("../conn.php");

// session details
$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
} 
  
// if a user tries yo access this page without a session redirect to the homepage
if (empty($artist = $_POST['rowid'])) {
  header("Location: ../edit/admin.php");
  exit();

} else {

$artist = $_POST['rowid'];

$readartists = "SELECT * FROM BARTIST WHERE pk_artist_id = $artist";
$resultreadartist = $conn->query($readartists);

$row = $resultreadartist->fetch_assoc();
$artistid = $row['pk_artist_id'];
$name = $row['name'];
$bio = $row['bio'];
$intro = $row['intro'];
$url = $row['url'];
$video = $row['video'];

$countartists = mysqli_num_rows($resultreadartist);

$readtime = "SELECT * FROM BARTIST 
INNER JOIN BACCOUNT ON fk_account_id = pk_account_id
INNER JOIN BPERFORMANCE ON fk_performance_id = pk_performance_id 
INNER JOIN BTIME ON fk_time_id = pk_time_id
INNER JOIN BDATE ON fk_date_id = pk_date_id
INNER JOIN BVENUE ON fk_venue_id = pk_venue_id
WHERE pk_artist_id = $artist";
$resultreadtime = $conn->query($readtime);


?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Time Slot | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="../css/custom.css" type="text/css">
    <link rel="stylesheet" href="../css/fontello.css" type="text/css">
    
    <!-- framework links and scripts -->
    <?php
      include("../modules/framework.html")
    ?>

    <!-- jQuery scrips and animations -->
    <script src="../scripts/script.js"></script>
    <script src="../scripts/accordian.js"></script>
    <script src="../scripts/login.js"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

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


      $(document).ready(function() {
        $('#exampleModalCenterTitle').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        alert(id);
        });
      });
    </script>
    
  </head>

  <body>

    <!-- include navbar -->
    <?php
      include("../modules/navbaredit.php");

      // display username of logged in user on any 'edit' pages
      if($privileges == 1502) {

        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      } else if ($privileges == 1501){
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      } else if($privileges == 1500) {
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      }
    ?>

    <div class="container admin">

      <div class="accordion" id="accordionExample">
      <a href='admin.php'><button type='button' class='btn btn-outline-secondary mb-2 text-uppercase mt-4 mb-4'>
      <i class='icon-left-open'></i>Back</button></a>
        <!-- accordian section 3 (Manage Artists) -->
        <div class="card">
          <div class="card-header" id="headingFour">
          <h1 class='mb-0 text-info admin mt-1'>
              
                <?php
                  echo $name;
                ?>

              <div class="float-right">
                <button class="btn btn-link text-info" id="h4drop" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  <i class="icon-up-open" id="arrow4"></i>
                </button>
              </div>
            </h2>
          </div>

          <!-- section 3 manage artists -->
          <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                    
              <?php

                if($countartists == 0) {

                  echo "<div class='row justify-content-center'>
                          <p>There are currently no artists to manage</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";

                } else {

                  echo "<div class='row'>
                          <table class='table table-hover'>
                            <thead>
                              <tr>
                                <th scope='col'>Time Slot / Location</th>
                              </tr>
                            </thead>
                          <tbody>";

                          while ($row = $resultreadtime->fetch_assoc()) {
                            
                            $email = ['email'];
                            $artist = $row['name'];
                            $curdate = $row['date'];
                            $artistid = $row['pk_artist_id'];
                            $perfid = $row['fk_performance_id'];
                            $curvenue = $row['venue_name'];
                            $curstart = $row['start_time'];
                            $curend = $row['end_time'];
                  
                            $curday = date('l', strtotime($curdate));
                            $curdayth = date('j', strtotime($curdate));
                            $curdays = date('S', strtotime($curdate));

                      // select date
                      echo "<tr>
                              <form action='edittimeprocess.php' method='POST'>
                              <td scope='row'>
                                <select class='form-control overflow-auto' name='perfid'>
                                  <option value='$perfid'>$curstart - $curend || $curday $curdayth$curdays || $curvenue </option>";

                                    $perf = "SELECT * FROM BPERFORMANCE 
                                    INNER JOIN BTIME ON fk_time_id = pk_time_id                  
                                    INNER JOIN BDATE ON fk_date_id = pk_date_id                                   
                                    INNER JOIN BVENUE ON fk_venue_id = pk_venue_id WHERE is_taken = 0";
                                    $readper = $conn->query($perf);

                                    while($row = $readper->fetch_assoc()) {
                                      $date = $row['date'];
                                      $perfid = $row['pk_performance_id'];
                                      $venue = $row['venue_name'];
                                      $start = $row['start_time'];
                                      $end = $row['end_time'];
                  
                                      $day = date('l', strtotime($date));
                                      $dayth = date('j', strtotime($date));
                                      $days = date('S', strtotime($date));

                                      echo "<option value='$perfid'>$start - $end || $day $dayth$days || $venue </option>";
                        
                                      }

                          echo "</select>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                              
                        <input type='hidden' value='$artistid' name='artistid'/>
                        <input type='hidden' value='$email' name='email'/>
                        <button type='submit' class='btn btn-outline-success ml-3' name='amendtime'>Allocate Time Slot</button>
                      </form>
                    </div>";
         
                  }
                }
              }
              
              ?>

              </div>
            </div>
          </div>
        </div>
      </div> 
           
    </div>
 
      
    <!-- footer -->
    <?php
      include("../modules/footeredit.html");
    ?>

  </body>
</html>