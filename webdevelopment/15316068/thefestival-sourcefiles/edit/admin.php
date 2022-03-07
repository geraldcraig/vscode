<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// session details
$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

// if a user tries to access this page without a session redirect to the login page
if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
} 

include("../conn.php");

// read all from applcation table
$read = "SELECT * FROM BAPPLICATION";
$result = $conn->query($read);

// read all from news table for news carousel
$readnews = "SELECT * FROM BNEWS";
$newsresults = $conn->query($readnews);

// read all from artists table who haven't been allocated at time (IS NULL)
$readtime = "SELECT * FROM BARTIST 
INNER JOIN BACCOUNT ON fk_account_id = pk_account_id 
WHERE fk_performance_id IS NULL";
$resultreadtime = $conn->query($readtime);

// read all from artists in ASC for manage artists admin panel
$readartists = "SELECT * FROM BARTIST 
INNER JOIN BACCOUNT ON fk_account_id = pk_account_id ORDER BY name ASC";
$resultreadartist = $conn->query($readartists);

// read all from artist for current active session (only display details 
// relating to this particular artist to edit whilse they are logged in)
$readart = "SELECT * FROM BARTIST INNER JOIN BACCOUNT ON fk_account_id = pk_account_id WHERE fk_account_id = $sessiondetails";
$readartresult = $conn->query($readart);

// read all users from account table for manage users admin panel
$readuser = "SELECT * FROM BACCOUNT INNER JOIN BPRIVILEGES ON fk_privileges_id = pk_privileges_id ORDER BY email ASC";
$processuser = $conn->query($readuser);

// read all from venue for venues admin panel
$venue = "SELECT * FROM BVENUE";
$venueprocess = $conn->query($venue);

// counts from each query for badge on each admin panel
$count = mysqli_num_rows($result);
$newscount = mysqli_num_rows($newsresults);
$counttimealocate = mysqli_num_rows($resultreadtime);
$countartists = mysqli_num_rows($resultreadartist);
$countusers = mysqli_num_rows($processuser)-1;                  //-1 as current user isn't display in 'manage users' admin panel
$countvenue = mysqli_num_rows($venueprocess);




?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | B Festival</title>
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
      // navbar highlighted animation for contact us when hovered over(this needs implemented on each page)
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
      include("../modules/navbaradminedit.php");

      // display username of logged in user on any 'edit' pages
      if($privileges == 1502) {
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> 
        $display
        <div class= 'float-right'>
        <form action='changepassword.php' method='POST'>
                <input type='hidden' value='$sessiondetails' name='rowid'/>
                <button type='submit' id='cp' name='changepassword'><i class='icon-key'></i></button>
                </form>
        </div>
      </div>";
      } else if ($privileges == 1501){
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> 
        $display
        <div class= 'float-right'>
        <form action='changepassword.php' method='POST'>
                <input type='hidden' value='$sessiondetails' name='rowid'/>
                <button type='submit' id='cp' name='changepassword'><i class='icon-key'></i></button>
                </form>
        </div>
      </div>";
      } else if($privileges == 1500) {
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> 
        $display
        <div class= 'float-right'>
        <form action='changepassword.php' method='POST'>
                <input type='hidden' value='$sessiondetails' name='rowid'/>
                <button type='submit' id='cp' name='changepassword'><i class='icon-key'></i></button>
                </form>
        </div>
      </div>";
      } else {

      }

      // alert messages on admin page that correspond with processed actions from each other page
      if(isset($notimage)) {
        echo "<div id='alert' class='p-3 mb-2 bg-warning text-white'><a href='admin.php'><i class='icon-right-open'></i></a> $notimage
        <button type='button' class='light'><i class='icon-cancel-circled'></i></button></div>";
      }

      if(isset($isempty)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $isempty</div>";
      }

      if(isset($fileexists)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $fileexists</div>";
      }

      if(isset($toolarge)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $toolarge</div>";
      }

      if(isset($filetype)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $filetype</div>";
      }

      if(isset($notuploaded)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $notuploaded</div>";
      }

      if(isset($error)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $error</div>";
      }

      if(isset($success)) {
        echo "<div class='p-3 mb-2 bg-success text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $success</div>";
      }

      if(isset($password_confirm_error)) {
        echo "<div class='p-3 mb-2 bg-warning text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $password_confirm_error</div>";
      }

      if(isset($password_length_error)) {
        echo "<div class='p-3 mb-2 bg-danger text-white'><a id='alert' href='admin.php'><i class='icon-cancel-circled'></i></a> $password_length_error</div>";
      }

    ?>

    <div class="container admin">

    <?php

      // admin priviledges ONLY
      if($privileges == 1502) {

        // create your schedule admin panel - THIS WILL ONLY DISPLAY ON USER PAGES
        // 'schedulearray[]' allows multiple id values to be passed to the createuserschedule.php which can then use
        // implode to add a seperator and explode to push it into an array.  This can then be iteratted through an 
        // associated array to populate the database
        echo "<div class='accordion mt-4' id='createyourschedule'>
                <div class='card'>
                  <div class='card-header' id='createyourschedulepanel'>
                    <h1 class='mb-0 text-info admin'>
                      Create Your Schedule 
                      <div class='float-right'>
                        <button class='btn btn-link text-info' id='h1drop' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                          <i class='icon-up-open' id='arrow1'></i>
                        </button>
                      </div>
                    </h1>
                  </div>

                  <div id='collapseOne' class='collapse' aria-labelledby='createyourschedulepanel' data-parent='#createyourschedule'>
                    <div class='card-body'>
                      <form action='createuserschedule.php' method='POST'>
                        <div class='p-3 mb-2 bg-light text-dark'>Friday</div>";

                          // show all artists playing on friday in ASC order to select
                          $friday = "SELECT * FROM BPERFORMANCE 
                          INNER JOIN BTIME ON fk_time_id = pk_time_id
                          INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                          INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                          INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                          WHERE fk_date_id = 400 ORDER BY name ASC";
  
                          $fridayquery = $conn->query($friday);

                          while ($row = $fridayquery->fetch_assoc()) {
                            $start = $row['start_time'];
                            $startdisp = date('g:ia', strtotime("$start"));
                            $end = $row['end_time'];
                            $enddisp = date('g:ia', strtotime("$end"));
                            $artist = $row['name'];
                            $venue = $row['venue_name'];
                            $location = $row['street'];
                            $id = $row['fk_performance_id'];

                      echo "<div class='input-group mb-3'>
                              <div class='input-group-prepend'>
                                <div class='input-group-text'>
                                  <input type='checkbox' name='schedulearray[]' value='$id'>
                                </div>
                              </div>
                              <span id='createschedartist' class='input-group-text flex-grow-1'>$artist</span>
                            </div>";
                              
                        }

                      echo "<div class='p-3 mb-2 bg-light text-dark'>Saturday</div>";

                              // show all artists playing on saturday in ASC order to select
                              $saturday = "SELECT * FROM BPERFORMANCE 
                              INNER JOIN BTIME ON fk_time_id = pk_time_id
                              INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                              INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                              INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                              WHERE fk_date_id = 401 ORDER BY name ASC";
          
                              $saturdayquery = $conn->query($saturday);

                              while ($row = $saturdayquery->fetch_assoc()) {
                                $start = $row['start_time'];
                                $startdisp = date('g:ia', strtotime("$start"));
                                $end = $row['end_time'];
                                $enddisp = date('g:ia', strtotime("$end"));
                                $artist = $row['name'];
                                $venue = $row['venue_name'];
                                $location = $row['street'];
                                $id = $row['fk_performance_id'];
          
                          echo "<div class='input-group mb-3'>
                                  <div class='input-group-prepend'>
                                    <div class='input-group-text'>
                                      <input type='checkbox' name='schedulearray[]' value='$id'>
                                    </div>
                                  </div>
                                  <span id='createschedartist' class='input-group-text flex-grow-1'>$artist</span>
                                </div>";
                                      
                              }

                          echo "<div class='p-3 mb-2 bg-light text-dark'>Sunday</div>";

                                  // show all artists playing on sunday in ASC order to select
                                  $sunday = "SELECT * FROM BPERFORMANCE 
                                  INNER JOIN BTIME ON fk_time_id = pk_time_id
                                  INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                                  INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                                  INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                                  WHERE fk_date_id = 402 ORDER BY name ASC";
              
                                  $sundayquery = $conn->query($sunday);

                                  while ($row = $sundayquery->fetch_assoc()) {
                                    $start = $row['start_time'];
                                    $startdisp = date('g:ia', strtotime("$start"));
                                    $end = $row['end_time'];
                                    $enddisp = date('g:ia', strtotime("$end"));
                                    $artist = $row['name'];
                                    $venue = $row['venue_name'];
                                    $location = $row['street'];
                                    $id = $row['fk_performance_id'];

                                    $selected = $id;
              
                              echo "<div class='input-group mb-3'>
                                      <div class='input-group-prepend'>
                                        <div class='input-group-text'>
                                          <input type='checkbox' name='schedulearray[]' value='$id'>
                                        </div>
                                      </div>
                                      <span id='createschedartist' class='input-group-text flex-grow-1'>$artist</span>
                                    </div>";
                                          
                                  }

                  echo "<input type='submit' class='btn btn-outline-success' name='createschedule' value='Create Schedule'>
                      </form>
                    </div>
                  </div>
                </div>
              </div>";           
      }

    ?>

    <?php

      // admin priviledges ONLY
      if($privileges == 1500) {

        // manage application 
        echo "<div class='accordion mt-4' id='artistapplication'>
                <div class='card'>
                  <div class='card-header' id='artistapplicationpanel' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                    <h1 class='mb-0 text-info admin'>
                      <span class='badge badge-light'>$count</span>
                      Applications 
                      <div class='float-right'>
                        <button class='btn btn-link text-info' id='h1drop' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                          <i class='icon-up-open' id='arrow1'></i>
                        </button>
                      </div>
                    </h1>
                  </div>

                  <div id='collapseOne' class='collapse' aria-labelledby='artistapplicationpanel' data-parent='#artistapplication'>
                    <div class='card-body'>";
                    
                    // If there are no new artists/pending artists applications
                    if($count == 0) {
                      echo "<div class='row justify-content-center'>
                              <p>There are no new applications</p>";

                    // If there are pending artists applications
                    } else {
                      echo " <div class='row scrollmenu'>
                                <table class='table table-hover'>
                                  <thead>
                                    <tr>
                                      <th scope='col'>Band</th>
                                      <th scope='col'>Email</th>
                                      <th scope='col'>Website</th>
                                      <th scope='col'>Accept</th> 
                                      <th scope='col'>Decline</th> 
                                    </tr>
                                  </thead>
                                  <tbody>";
                    }

                    while ($row = $result->fetch_assoc()) {
                      
                      $artist = $row['apply_name'];
                      $email = $row['apply_email'];
                      $website = $row['apply_url'];
                      $id = $row['pk_application_id'];
                      $image = $row['apply_image'];
                      $url = $row['apply_url'];
                      $video = $row['apply_video'];
                      $genre = $row['fk_genre_id'];
                      $bio = $row['apply_bio'];
                    
                      echo "<tr>
                              <td scope='row'>$artist</td>
                              <td>$email</td>
                              <td><a href='$website'>$website</a></td>
                              <form action='adminprocess.php' method='POST'>
                                <input type='hidden' value='$id' name='rowid'/>
                                <td class=''><button type='submit' class='btn btn-outline-success' name='acceptapp'><i class='icon-ok-circled'></i></button></td>
                              </form>
                              <form action='declineapplicationprocess.php' method='POST'>
                                <input type='hidden' value='$id' name='rowid'/>
                                <input type='hidden' value='$email' name='email'/>
                                <td class=''><button type='submit' class='btn btn-outline-danger' name='declineapp'><i class='icon-cancel-circled'></i></button></td>
                              </form>
                            </tr>";
                                
                      }

                      echo"</tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>"; 
      }

    ?>

    <?php

      // admin priviledges ONLY
      if($privileges == 1500) {
          
        // allocate time slot
        echo "<div class='accordion mt-4' id='allocatetimeslot'>
                <div class='card'>
                  <div class='card-header' id='headingTwo'>
                    <h1 class='mb-0 text-info admin'> 
                      <span class='badge badge-light'>$counttimealocate</span>
                      Allocate Time Slots
                      <div class='float-right'>
                        <button class='btn btn-link text-info' id='h2drop' type='button' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                          <i class='icon-up-open' id='arrow2'></i>
                        </button>
                      </div>
                    </h1>
                  </div>

                  <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#allocatetimeslot'>
                    <div class='card-body'>";

                      // if all accepted artists have been allocated a timeslot 
                      if($counttimealocate == 0) {
                        echo "<div class='row justify-content-center'>
                                <p>All artists have been allocated a time slot</p>";

                      // If there are timeslot allocations for artists pending      
                      } else {
                        echo "<div class='row'>
                              <table class='table table-hover'>
                                <thead>
                                  <tr>
                                    <th scope='col'>Time Slot / Location</th>
                                    <th scope='col'>Artist</th>
                                    <th scope='col'>Confirm</th> 
                                  </tr>
                                </thead>
                                <tbody>";

                        // show all performance slots and their related information
                        $performance = "SELECT * FROM BPERFORMANCE 
                        INNER JOIN BTIME ON fk_time_id = pk_time_id                  
                        INNER JOIN BDATE ON fk_date_id = pk_date_id                                   
                        INNER JOIN BVENUE ON fk_venue_id = pk_venue_id";
                        $readperformance = $conn->query($performance);

                        while ($row = $resultreadtime->fetch_assoc()) {
                          
                          $artist = $row['name'];
                          $artistid = $row['pk_artist_id'];
                          $email = $row['email'];

                          // timeslot ticker select 
                          echo "<tr>
                                  <form action='allocateprocesstimeslot.php' method='POST'>
                                    <td scope='row'>
                                      <select class='form-control overflow-auto' name='perfid'>
                                        <option value=''>Default select</option>";

                                          // only show timeslots that are not already allocated to another artists
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
                                  <td>$artist</td>
                                    <input type='hidden' value='$artistid' name='artistid'/>
                                    <input type='hidden' value='$email' name='email'/>
                                    <td class=''><button type='submit' class='btn btn-outline-success' name='allocatetime'><i class='icon-ok-circled'></i></button></td>
                                  </form>
                                </tr>";   
                        }
                      }
 
                        echo "</tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";

      }
    ?>

    <?php

      if($privileges == 1500 || 1501) {

      // manage artists
      echo "<div class='accordion mt-4' id='manageartists'>
      
          <div class='card'>
            <div class='card-header' id='manageartistspanel'>
              <h1 class='mb-0 text-info admin'>";

                // if user session privileges - DISPLAY ON ADMIN ONLY
                if($privileges == 1500) {
                  
                  echo "<span class='badge badge-light'>$countartists</span>
                          Manage Artists";
                }

                // if user session privileges - DISPLAY ON ARTIST ONLY
                if($privileges == 1501) {

                  $artistname = "SELECT * FROM BARTIST WHERE fk_account_id = $sessiondetails";
                  $getartistname = $conn->query($artistname);

                  while($row = $getartistname->fetch_assoc()) {

                    $name = $row['name'];

                    echo $name;
                  }
        
                }

                // if user session privileges - DISPLAY ON USER ONLY
                if($privileges == 1502) {
                  echo "View Your Schedule";
                }

                    
                
        echo "<div class='float-right'>
                <button class='btn btn-link text-info' id='h4drop' type='button' data-toggle='collapse' data-target='#collapseFour' aria-expanded='true' aria-controls='collapseFour'>
                  <i class='icon-up-open' id='arrow4'></i>
                </button>
              </div>
            </h1>
          </div>

          <div id='collapseFour' class='collapse";if($privileges == 1501){ echo"show'";} else { echo "";} echo "' aria-labelledby='headingFour' data-parent='#manageartists'>
            <div class='card-body'>";

              if($countartists == 0) {
                  echo "<div class='row justify-content-center'>
                          <p>There are currently no artists to manage</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
                              
              } else {

                 // if user session privileges - DISPLAY ON ADMIN ONLY
                if ($privileges == 1500) {
                        
                  echo "<div class='row scrollmenu'>
                          <table class='table table-hover'>
                            <thead>
                              <tr>
                                <th scope='col'>Artist</th>
                                <th scope='col'>Remove</th>
                                <th scope='col'>Edit Info</th>
                                <th scope='col'>Edit Members</th>
                                <th scope='col'>Latest Release</th>
                                <th scope='col'>Update Time</th>
                              </tr>
                            </thead>
                            <tbody>";
                }

                 // if user session privileges - DISPLAY ON ARTISTS ONLY
                if ($privileges == 1501) {

                  echo "<div class='row scrollmenu'>
                          <table class='table table-hover'>
                            <thead>
                              <tr>
                                <th scope='col'>Edit Info</th>
                                <th scope='col'>Edit Members</th>
                                <th scope='col'>Latest Release</th>
                              </tr>
                            </thead>
                            <tbody>";
                }

                 // if user session privileges - DISPLAY ON ADMIN ONLY
                if($privileges == 1500) {
                        
                  while ($row = $resultreadartist->fetch_assoc()) {
                    $artistid = $row['pk_artist_id'];
                    $arttime = $row['fk_performance_id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    
                    echo "<tr>
                            <td scope='row'>$name</td>
                            <td class=''><input type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModalCenter$artistid' value='Remove'></td>
                            
                            <div class='modal fade' id='exampleModalCenter$artistid' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                              
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalCenterTitle'>Delete Artist</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                  <p>Are you sure?</p>
                                </div>
                                <div class='modal-footer'>
                                <form action='deleteartistprocess.php' method='POST'>
                                  <input type='hidden' value='$artistid' name='rowid'/>
                                  <input type='hidden' value='$email' name='email'/>
                                  <input type='button' class='btn btn-outline-secondary' data-dismiss='modal' value='Close'>
                                  <input type='submit' class='btn btn-outline-danger' name='deleteartist' value='Yes'>
                                </form>
                                </div>
                          
                                  <form action='editartist.php' method='POST'>
                                    <input type='hidden' value='$artistid' name='rowid'/>
                                    <td class=''><button type='submit' class='btn btn-outline-secondary' name='editartistinfo'><i class='icon-edit'></i></button></td>
                                  </form>

                                  <form action='editmembers.php' method='POST'>
                                    <input type='hidden' value='$artistid' name='rowid'/>
                                    <td class=''><a href='editartist.php'><button type='submit' class='btn btn-outline-secondary' name='editartistmember'><i class='icon-edit'></i></button></a></td>
                                  </form>

                                  <td>
                                    <form action='editrelease.php' method='POST'>
                                    <input type='hidden' value='$artistid' name='rowid'/>
                                    <button type='submit' class='btn btn-outline-secondary float-left mr-3' name='editartistrelease'><i class='icon-edit'></i></button>
                                  </form>
                                  
                                  <form action='deleterelease.php' method='POST'>
                                    <input type='hidden' value='$artistid' name='rowid'/>
                                    <button type='submit' class='btn btn-outline-danger float-center' name='removerelease'><i class='icon-cancel-circled'></i></button>
                                  </form>
                                </td>";

                                  if(is_null($arttime)){ 
                                    echo "<td class=''><button type='submit' class='btn btn-outline-secondary disabled' name='editartisttime'><i class='icon-calendar-empty'></i></button></td>";
                                  } else {
                                  echo "<form action='editartisttime.php' method='POST'>
                                          <input type='hidden' value='$artistid' name='rowid'/>
                                          <td class=''><button type='submit' class='btn btn-outline-secondary' name='editartisttime'><i class='icon-calendar-empty'></i></button></td>
                                        </form>";
                                  }
                  }  
                      
                }
                
                // if user session privileges - DISPLAY ON ARTISTS ONLY
                if($privileges == 1501) {

                  while($row = $readartresult->fetch_assoc()) {
                    
                    $artid = $row['pk_artist_id'];

                    echo "<form action='editartist.php' method='POST'>
                            <input type='hidden' value='$artid' name='rowid'/>
                            <td class=''><button type='submit' class='btn btn-outline-secondary' name='editartistinfo'><i class='icon-edit'></i></button></td>
                          </form>
      
                          <form action='editmembers.php' method='POST'>
                            <input type='hidden' value='$artid' name='rowid'/>
                            <td class=''><a href='editartist.php'><button type='submit' class='btn btn-outline-secondary' name='editartistmember'><i class='icon-edit'></i></button></a></td>
                          </form>
      
                          <td>
                            <form action='editrelease.php' method='POST'>
                              <input type='hidden' value='$artid' name='rowid'/>
                              <button type='submit' class='btn btn-outline-secondary float-left mr-3' name='editartistrelease'><i class='icon-edit'></i></button>
                            </form>
                                        
                            <form action='deleterelease.php' method='POST'>
                              <input type='hidden' value='$artid' name='rowid'/>
                              <button type='submit' class='btn btn-outline-danger float-center' name='removerelease'><i class='icon-cancel-circled'></i></button>
                            </form>";
                  }
 
                }

                // if user session privileges - DISPLAY ON USER ONLY
                if($privileges == 1502) {

                  echo "<div class='p-3 mb-2 bg-light text-dark'>Friday</div>
                          <div class='row scrollmenu'>
                            <table class='table table-hover'>
                              <thead>
                                <tr>
                                  <th width='33.3333%' scope='col'>Time</th>
                                  <th width='33.3333%' scope='col'>Artist</th>
                                  <th width='33.3333%' scope='col'>Venue</th>
                                </tr>
                              </thead>
                              <tbody>";

                        // view user schedule 
                        // popoluate two arrays simultaneously for start time and end time to compare start time with start 
                        // time and end time of the artist before and artist after to ensure there isn't an overlap
                        // if there is an overlap in time, then display a warning message to alert user there is a time clash
                        // with artists in their selected schedule


                        // show selected artists for friday
                        $showuserschedule = "SELECT * FROM BUSCHEDULE
                        INNER JOIN BPERFORMANCE ON BUSCHEDULE.fk_performance_id = BPERFORMANCE.pk_performance_id
                        INNER JOIN BARTIST ON BPERFORMANCE.pk_performance_id = BARTIST.fk_performance_id
                        INNER JOIN BDATE ON BPERFORMANCE.fk_date_id = BDATE.pk_date_id
                        INNER JOIN BTIME ON BPERFORMANCE.fk_time_id = BTIME.pk_time_id
                        INNER JOIN BVENUE ON BPERFORMANCE.fk_venue_id = BVENUE.pk_venue_id
                        WHERE BUSCHEDULE.fk_account_id = $sessiondetails AND fk_date_id = 400 ORDER BY start_time DESC";

                        $runshowuser = $conn->query($showuserschedule);

                        $validatestart = [];
                        $validateend = [];
                        $i = 0;

                        while($row = $runshowuser->fetch_assoc()) {
                          $start = $row['start_time'];
                          $startdisp = date('g:ia', strtotime("$start"));
                          $end = $row['end_time'];
                          $enddisp = date('g:ia', strtotime("$end"));
                          $artist = $row['name'];
                          $venue = $row['venue_name'];
                          $id = $row['pk_artist_id'];

                          // create array to validate start and 
                          // end times for timeslot overlaps
                          array_push($validatestart, $start);
                          array_push($validateend, $end);

                          echo "<tr>
                                  <td width='33.3333%'>$startdisp - $enddisp"; 
                                  
                                  if($i > 0) {
                                    // validating time slots for users
                                    // if there is an overlap of times, 
                                    // inform the user so they can choose/plan accordingly
                                    if(($validatestart[$i] >= $validatestart[$i-1]) && ($validatestart[$i] <= $validateend[$i-1])
                                    || ($validatestart[$i-1] >= $validatestart[$i]) && ($validatestart[$i-1] <= $validateend[$i])) {
        
                                      echo"<p class='text-warning'>time overlaps with next artist</p>";
        
                                    }
                                  }
                                  
                                  echo"</td>
                                  <td width='33.3333%'>$artist</td>
                                  <td width='33.3333%'>$venue</td>
                                </tr>
                                </tr>";
    
                          $i++;

                        }

                        echo "</tbody>
                        </table>
                      </div>";

                        echo "
                        <div class='p-3 mb-2 bg-light text-dark'>Saturday</div>
                          <div class='row scrollmenu'>
                            <table class='table table-hover'>
                              <thead>
                                <tr>
                                  <th width='33.3333%' scope='col'>Time</th>
                                  <th width='33.3333%' scope='col'>Artist</th>
                                  <th width='33.3333%' scope='col'>Venue</th>
                                </tr>
                              </thead>
                              <tbody>";

                        // show selected artists for saturday
                        $showuserschedule = "SELECT * FROM BUSCHEDULE
                        INNER JOIN BPERFORMANCE ON BUSCHEDULE.fk_performance_id = BPERFORMANCE.pk_performance_id
                        INNER JOIN BARTIST ON BPERFORMANCE.pk_performance_id = BARTIST.fk_performance_id
                        INNER JOIN BDATE ON BPERFORMANCE.fk_date_id = BDATE.pk_date_id
                        INNER JOIN BTIME ON BPERFORMANCE.fk_time_id = BTIME.pk_time_id
                        INNER JOIN BVENUE ON BPERFORMANCE.fk_venue_id = BVENUE.pk_venue_id
                        WHERE BUSCHEDULE.fk_account_id = $sessiondetails AND fk_date_id = 401 ORDER BY start_time DESC";

                        $runshowuser = $conn->query($showuserschedule);

                        $validatestarttwo = [];
                        $validateendtwo = [];
                        $m = 0;

                        while($row = $runshowuser->fetch_assoc()) {
                          $start = $row['start_time'];
                          $startdisp = date('g:ia', strtotime("$start"));
                          $end = $row['end_time'];
                          $enddisp = date('g:ia', strtotime("$end"));
                          $artist = $row['name'];
                          $venue = $row['venue_name'];
                          $id = $row['pk_artist_id'];

                          array_push($validatestarttwo, $start);
                          array_push($validateendtwo, $end);

                          echo "<tr>";

                                  echo "<td width='33.3333%'>$startdisp - $enddisp"; 
                                  
                                  if($m > 0) {

                                    if(($validatestarttwo[$m] >= $validatestarttwo[$m-1]) && ($validatestarttwo[$m] <= $validateendtwo[$m-1])
                                    || ($validatestarttwo[$m-1] >= $validatestarttwo[$m]) && ($validatestarttwo[$m-1] <= $validateendtwo[$m])) {
        
                                      echo"<p class='text-warning'>time overlaps with next artist</p>";
        
                                    }
                                  }
                                  echo"</td>
                                  <td width='33.3333%'>$artist</td>
                                  <td width='33.3333%'>$venue</td>
                                </tr>
                                </tr>";
    

                          $m++;

                        }

                        echo "</tbody>
                        </table>
                      </div>";

                        echo "
                        <div class='p-3 mb-2 bg-light text-dark'>Sunday</div>
                          <div class='row scrollmenu'>
                            <table class='table table-hover'>
                              <thead>
                                <tr>
                                  <th width='33.3333%' scope='col'>Time</th>
                                  <th width='33.3333%'scope='col'>Artist</th>
                                  <th width='33.3333%' scope='col'>Venue</th>
                                </tr>
                              </thead>
                              <tbody>";

                        // show selected artists for sunday
                        $showuserschedule = "SELECT * FROM BUSCHEDULE
                        INNER JOIN BPERFORMANCE ON BUSCHEDULE.fk_performance_id = BPERFORMANCE.pk_performance_id
                        INNER JOIN BARTIST ON BPERFORMANCE.pk_performance_id = BARTIST.fk_performance_id
                        INNER JOIN BDATE ON BPERFORMANCE.fk_date_id = BDATE.pk_date_id
                        INNER JOIN BTIME ON BPERFORMANCE.fk_time_id = BTIME.pk_time_id
                        INNER JOIN BVENUE ON BPERFORMANCE.fk_venue_id = BVENUE.pk_venue_id
                        WHERE BUSCHEDULE.fk_account_id = $sessiondetails AND fk_date_id = 402 ORDER BY start_time DESC";

                        $runshowuser = $conn->query($showuserschedule);

                        $validatestart3 = [];
                        $validateend3 = [];
                        $j = 0;

                        while($row = $runshowuser->fetch_assoc()) {
                          $start = $row['start_time'];
                          $startdisp = date('g:ia', strtotime("$start"));
                          $end = $row['end_time'];
                          $enddisp = date('g:ia', strtotime("$end"));
                          $artist = $row['name'];
                          $venue = $row['venue_name'];
                          $id = $row['pk_artist_id'];

                          array_push($validatestart3, $start);
                          array_push($validateend3, $end);

                          echo "<tr>";

                                  echo "<td width='33.3333%'>$startdisp - $enddisp"; 

                                  if($j > 0) {

                                    if(($validatestart3[$j] >= $validatestart3[$j-1]) && ($validatestart3[$j] <= $validateend3[$j-1])
                                    || ($validatestart3[$j-1] >= $validatestart3[$j]) && ($validatestart3[$j-1] <= $validateend3[$j])) {
        
                                      echo"<p class='text-warning'>time overlaps with next artist</p>";
        
                                    }
                                  }
                                  
                                  echo"</td>
                                  <td width='33.3333%'>$artist</td>
                                  <td width='33.3333%'>$venue </td>
                                </tr>
                                </tr>";

                          $j++;

                        }

                      }
                      echo "</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
        }
    }
  ?>

  <?php

    if($privileges == 1500) {

      // manage users
      echo "<div class='accordion mt-4' id='manageusers'>
              <div class='card'>
                <div class='card-header' id='manageuserspanel'>
                  <h1 class='mb-0 text-info admin'>";
                    
                    if($privileges == 1500) {
                      echo "<span class='badge badge-light'>$countusers</span>
                              Manage Users ";
                      }

        echo "<div class='float-right'>
                <button class='btn btn-link text-info' id='h6drop' type='button' data-toggle='collapse' data-target='#collapseSix' 
                aria-expanded='true' aria-controls='collapseSix'>
                  <i class='icon-up-open' id='arrow6'></i>
                </button>
              </div>
            </h1>
          </div>

          <div id='collapseSix' class='collapse' aria-labelledby='manageuserspanel' data-parent='#manageusers'>
            <div class='card-body'>";

              if($countusers == 0) {
                echo"<div class='row justify-content-center'>
                        <p>There are currently no users to manage</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";

              } else {

                if ($privileges == 1500) {
                  echo "<div class='row scrollmenu'>
                          <table class='table table-hover'>
                            <thead>
                              <tr>
                                <th scope='col'>User</th>
                                <th scope='col'>Account Privilege</th>
                                <th scope='col'></th>
                                <th scope='col'></th>
                              </tr>
                            </thead>
                          <tbody>";
                }

                while ($row = $processuser->fetch_assoc()) {
                  $accid = $row['pk_account_id'];
                  $useremail = $row['email'];
                  $username = $row['username'];
                  $accprivilege = $row['fk_privileges_id'];
                  $privname = $row['privilege_name'];

                  echo "<tr>";

                  // DON'T display email of current active user
                  if($username == $display) {

                  } else {

                  echo"<td scope='row'>$useremail</td>";
                    
                  if($accprivilege == 1501) {
                    echo "<td scope='row'>$privname</td>
                            <td></td>
                            <td class=''></td>";

                  } else {

                    echo "<td>
                            <form action='updateuserprivileges.php' method='POST'>
                              <select class='form-control overflow-auto' name='privileges'>
                                <option value=' '>$privname</option>";

                                  $readaccp = "SELECT * FROM BPRIVILEGES WHERE pk_privileges_id != 1501";
                                  $processaccp = $conn->query($readaccp);

                                  while($row = $processaccp->fetch_assoc()) {
                                                    
                                    $priv = $row['privilege_name'];
                                    $id = $row['pk_privileges_id'];

                                    if($privname != $priv) {

                                      echo "<option value='$id'>$priv</option>";

                                    }
                                  }

                            echo "</select>
                                </td>
                                <td>
                                  <input type='hidden' value='$accid' name='rowid'/>
                                  <input type='submit' class='btn btn-outline-success float-center' name='updateprivileges' value='Update'>
                                </form>
                                </td>
                                <td class=''><input type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModalCenter$accid' value='Remove'></td>
                                  <div class='modal fade' id='exampleModalCenter$accid' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h5 class='modal-title' id='exampleModalCenterTitle'>Delete User account</h5>
                                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                          </button>
                                      </div>
                                      <div class='modal-body'>
                                        <p>Are you sure?</p>
                                      </div>
                                      <div class='modal-footer'>
                                      <form action='userprocess.php' method='POST'>
                                        <input type='hidden' value='$accid' name='rowid'/>
                                        <input type='button' class='btn btn-outline-secondary' data-dismiss='modal' value='Close'>
                                        <input type='submit' class='btn btn-outline-danger' name='deleteuser' value='Yes'>
                                        </form>
                                      </div>";
                          }
                        } 
                      } 
                        echo "</tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>";
                    }
    }
                            
      
  ?>

  <?php

    // admin priviledges ONLY
    if($privileges == 1500) {

        // news carousel
        echo "<div class='accordion mt-4' id='newscarousel'>
                <div class='card'>
                  <div class='card-header' id='newscarouselpanel'>
                  <h1 class='mb-0 text-info admin'>
                        <span class='badge badge-light'>
                          $newscount
                        </span>
                        News Carousel
                      <div class='float-right'>
                        <button class='btn btn-link text-info' id='h3drop' type='button' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                          <i class='icon-up-open' id='arrow3'></i>
                        </button>
                      </div>
                    </h2>
                  </div>

                  <div id='collapseThree' class='collapse' aria-labelledby='newscarouselpanel' data-parent='#newscarousel'>
                    <div class='card-body'>
                      <div class='row'>
                        <table class='table table-hover'>
                          <thead>
                            <tr>
                              <th scope='col'>News</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr class='text-center'>
                              <td><a href='adminedit.php'><i class='addnews icon-plus-circled'></i></a></td>
                            </tr>";

                            while($row = $newsresults->fetch_assoc()) {
                                          
                              $news = $row['news_id'];
                              $type = $row['type'];
                              $title = $row['title'];
                              $content = $row['content'];
                              $url = $row['url'];
                              $date = $row['created'];

                              echo "<tr>
                                      <td>
                                        <div class='card-header'>
                                          $type
                                          <small class='text-muted'>Last updated: $date</small>
                                        </div>
                                        <div class='card-body' id='newscards'>
                                          <h5 class='card-title'>$title</h5>
                                          <p class='card-text'>$content.</p>
                                          </div>
                                          <div class='card-footer'><a href='$url' class='btn btn-outline-info justify-content-end disabled' aria-disabled='true'>See More</a>
                                          <div class='row float-right'>
                                            <form  action='adminnews.php' method='POST'>
                                              <input type='hidden' value='$news' name='newsidedit'/>
                                              <button type='submit' class='d-inline btn btn-outline-secondary mt-1 mr-1' name='editnewsstory'><i class='icon-edit'></i></button>
                                            </form>
                                                                          
                                            <form  action='deletenewsprocess.php' method='POST'>
                                              <input type='hidden' value='$news' name='newsid'/>
                                              <button type='submit' class='d-inline btn btn-outline-danger mt-1' name='deletestory'><i class='icon-cancel-circled'></i></button>
                                            </form>
                                          </div>
                                        </div>
                                      </td>   
                                    </tr>";
                            }

            echo "</tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>";

      }
      ?>

      <?php

      // admin priviledges ONLY
      if($privileges == 1500) {

        // homepage content
        echo "<div class='accordion mt-4' id='homepagecontent'>
                <div class='card'>
                  <div class='card-header' id='homepagecontentpanel'>
                  <h1 class='mb-0 text-info admin'>
                      Home Page Content
                      <div class='float-right'>
                        <button class='btn btn-link text-info' id='h5drop' type='button' data-toggle='collapse' data-target='#collapseFive' aria-expanded='true' aria-controls='collapseFive'>
                          <i class='icon-up-open' id='arrow5'></i>
                        </button>
                      </div>
                    </h2>
                  </div>

        
                  <div id='collapseFive' class='collapse' aria-labelledby='homepagecontentpanel' data-parent='#homepagecontent'>
                    <div class='card-body'>";

                      $homepage = "SELECT * FROM BFESTIVAL WHERE pk_fest_id = 1";
                      $readhomepage = $conn->query($homepage);

                      $row = $readhomepage->fetch_assoc();
                      $pagetitle = $row['fest_pagetitle'];
                      $fest_description = $row['fest_description'];
                              
                      echo" <form action='homepageupprocess.php' method='POST'>
                              <div class='form-row'>
                                <label for='inputEmail4'>Homepage Title</label>
                                <input type='text' class='form-control' name='pagetitle' value='$pagetitle'>
                              </div>
                              <div class='form-row'>
                                <label for='inputEmail4'>Homepage Content</label>
                                <textarea type='text' class='form-control' name='pagedescrip' >$fest_description</textarea>
                              </div>
                              <div class='input-group'>
                                <input type='submit' class='btn btn-outline-success input-group-btn mt-3' name='homepageupdate' value='Update'>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>";

      }

      if($privileges == 1500) {

        // manage venues
        echo "<div class='accordion mt-4' id='managevenues'>
        <div class='card'>
          <div class='card-header' id='managevenuespanel'>
          <h1 class='mb-0 text-info admin'>
                    <span class='badge badge-light'>
                    $countvenue
                  </span>
                  Venues
                
                <div class='float-right'>
                  <button class='btn btn-link text-info' id='h7drop' type='button' data-toggle='collapse' data-target='#collapseSeven' aria-expanded='true' aria-controls='collapseSeven'>
                    <i class='icon-up-open' id='arrow7'></i>
                  </button>
                </div>
            </h2>
          </div>

          
        <div id='collapseSeven' class='collapse' aria-labelledby='managevenuespanel' data-parent='#managevenues'>
          <div class='card-body'>";

          if($countvenue == 0) {
            echo"<div class='row justify-content-center'>
                    <p>There are currently no users to manage</p>
                  </div>
                </div>
              </div>
            </div>
          </div>";

          } else {

            if ($privileges == 1500) {
              echo "<div class='row scrollmenu'>
                      <table class='table table-hover'>
                        <thead>
                          <tr>
                            <th witdh='50%' scope='col'>Venue</th>
                            <th witdh='50%' scope='col'>Update</th>
                          </tr>
                        </thead>
                      <tbody>";
                    }

                    while($row = $venueprocess->fetch_assoc()) {
                      $venuename = $row['venue_name'];
                      $venueid = $row['pk_venue_id'];

                      echo "<tr>
                              <td witdh='50%'>$venuename</td>
                              <td witdh='50%'>
                              <form action='editvenue.php' method='POST'>
                                <input type='hidden' value='$venueid' name='rowid'/>
                                <button type='submit' class='btn btn-outline-secondary float-left mr-3' name='editvenue'><i class='icon-edit'></i></button>
                                </form>
                              </td>
                            </tr>";

                    }

                    
                  } 
                    echo "
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
                }
                      
                  
      

      ?>
  
      </div>                 

    <!-- footer -->
    <?php
      include("../modules/footeredit.html");
    ?>

  </body>
</html>