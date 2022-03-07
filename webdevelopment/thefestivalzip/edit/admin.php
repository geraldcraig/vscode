<?php

session_start();

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
} 
  

  // echo $_SESSION['privileges'];
  
  
//   $user = $_POST['emailsignup'];
//   $password = $_POST['passwordsignup'];

//   $login = "SELECT * FROM BACCOUNT WHERE username ='$user' AND password = '$password'";
//   $result = $conn->query($login);

//   $numberofrows = $result->num_rows;

//   while($row = $result->fetch_assoc()) {
//       $type = $row['typeuser'];
//   }

//   echo $numberofrows;

//   if($numberofrows > 0) {

//       $_SESSION['emailsignup'] = $user;
//       $_SESSION['fk_privilege_id'] = $type;
//       echo $_SESSION['fk_privilege_id'] = $type;
      
//   }

// } else {
//   echo "first visit";
// }

include("../conn.php");

$read = "SELECT * FROM BAPPLICATION";
$result = $conn->query($read);

$readnews = "SELECT * FROM BNEWS";
$newsresults = $conn->query($readnews);

$readtime = "SELECT * FROM BARTIST WHERE fk_performance_id IS NULL";
$resultreadtime = $conn->query($readtime);

$readartists = "SELECT * FROM BARTIST ORDER BY name ASC";
$resultreadartist = $conn->query($readartists);

$readart = "SELECT * FROM BARTIST INNER JOIN BACCOUNT ON fk_account_id = pk_account_id WHERE fk_account_id = $sessiondetails";
$readartresult = $conn->query($readart);

$readuser = "SELECT * FROM BACCOUNT INNER JOIN BPRIVILEGES ON fk_privileges_id = pk_privileges_id ORDER BY email ASC";
$processuser = $conn->query($readuser);

$count = mysqli_num_rows($result);
$newscount = mysqli_num_rows($newsresults);
$counttimealocate = mysqli_num_rows($resultreadtime);
$countartists = mysqli_num_rows($resultreadartist);
$countusers = mysqli_num_rows($processuser)-1;

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | B Festival</title>
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
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      } else if ($privileges == 1501){
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      } else if($privileges == 1500) {
        echo "<div class='p-3 mb-2 bg-info text-white'><i class='icon-right-open'></i> $display</div>";
      }

    ?>

<div class="container admin">

<?php

      // admin priviledges ONLY
      if($privileges == 1502) {

        echo "<div class='accordion' id='accordionExample'>
        <div class='card'>
          <div class='card-header' id='headingTwo'>
            <h2 class='mb-0'>
                <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' data-target='#collapseSix' aria-expanded='true' aria-controls='collapseSix'>
                    Create Your Schedule
                    <span class='badge badge-light'>
                      -
                    </span>
                </button>
                <div class='float-right'>
                  <button class='btn btn-link' id='h6drop' type='button' data-toggle='collapse' data-target='#collapseSix' aria-expanded='true' aria-controls='collapseSix'>
                    <i class='icon-up-open' id='arrow6'></i>
                  </button>
                </div>
            </h2>
          </div>

          
        <div id='collapseSix' class='collapse' aria-labelledby='headingSix' data-parent='#accordionExample'>
          <div class='card-body'>";

                      echo "<form action='createuserschedule.php' method='POST'>
                      <div class='p-3 mb-2 bg-light text-dark'>Friday</div>";

                      $friday = "SELECT * FROM BPERFORMANCE 
                      INNER JOIN BTIME ON fk_time_id = pk_time_id
                      INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                      INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                      INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                      WHERE fk_date_id = 400 ORDER BY start_time DESC";
  
                      $fridayquery = $conn->query($friday);
  
                      // $arrayfriday =[];
                      // $schedulearray = [];

                      while ($row = $fridayquery->fetch_assoc()) {
                        $start = $row['start_time'];
                        $startdisp = date('g:ia', strtotime("$start"));
                        $end = $row['end_time'];
                        $enddisp = date('g:ia', strtotime("$end"));
                        $artist = $row['name'];
                        $venue = $row['venue_name'];
                        $location = $row['street'];
                        $id = $row['fk_performance_id'];

                
  
                        echo "
                        <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                  <div class='input-group-text'>
                                    <input type='checkbox' name='schedulearray[]' value='$id'>
                                  </div>
                                </div>
                                <span class='input-group-text flex-grow-1'>$artist.$id</span>
                              </div>
                              ";
                              // if(isset($select)) {
                              // array_push($schedulearray, $selected);
                              // echo "<input type='hidden' value='arist-$id' name='fridayarray'>";
                              // }
                      }

                      

                      echo "<div class='p-3 mb-2 bg-light text-dark'>Saturday</div>";

                      $saturday = "SELECT * FROM BPERFORMANCE 
                      INNER JOIN BTIME ON fk_time_id = pk_time_id
                      INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                      INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                      INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                      WHERE fk_date_id = 401 ORDER BY start_time DESC";
  
                      $saturdayquery = $conn->query($saturday);
  
                      // $arraysaturday =[];

                      while ($row = $saturdayquery->fetch_assoc()) {
                        $start = $row['start_time'];
                        $startdisp = date('g:ia', strtotime("$start"));
                        $end = $row['end_time'];
                        $enddisp = date('g:ia', strtotime("$end"));
                        $artist = $row['name'];
                        $venue = $row['venue_name'];
                        $location = $row['street'];
                        $id = $row['fk_performance_id'];

                        // $selected = $id;
  
                        echo "
                        <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                  <div class='input-group-text'>
                                    <input type='checkbox' name='schedulearray[]' value='$id'>
                                  </div>
                                </div>
                                <span class='input-group-text flex-grow-1'>$artist</span>
                              </div>
                              ";
                              // if(isset($selected)) {
                              // array_push($schedulearray, $selected);
                              // echo "<input type='hidden' value='arist-$id' name='saturdayarray'>";
                              // }
                      }

                      // $saturdaylength = count($arraysaturday);

                      echo "<div class='p-3 mb-2 bg-light text-dark'>Sunday</div>";

                      $sunday = "SELECT * FROM BPERFORMANCE 
                      INNER JOIN BTIME ON fk_time_id = pk_time_id
                      INNER JOIN BARTIST ON pk_performance_id = fk_performance_id               
                      INNER JOIN BVENUE ON fk_venue_id = pk_venue_id               
                      INNER JOIN BADDRESS ON pk_address_id = fk_address_id              
                      WHERE fk_date_id = 402 ORDER BY start_time DESC";
  
                      $sundayquery = $conn->query($sunday);
  
                      // $arraysunday =[];

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
  
                        echo "
                        <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                  <div class='input-group-text'>
                                    <input type='checkbox' name='schedulearray[]' value='$id'>
                                  </div>
                                </div>
                                <span class='input-group-text flex-grow-1'>$artist</span>
                              </div>
                              ";
                              // if(isset($selected)) {
                              // array_push($schedulearray, $selected);
                              // echo "<input type='hidden' value='arist-$id' name='sundayarray'>";
                              // }
                      }

                      // $sundaylength = count($arraysunday);

                     

                      // $i = 0;

                      // while($i < $schedulelength) {
                      //   echo "<input type='hidden' value='$schedulearray[$i]' name='scheduleartists$i'>";
                      //   $i++;
                      // }

                      
                          
                      echo "
                      
                      <input type='submit' class='btn btn-outline-success' name='createschedule' value='Create Schedule'>
                        </form>";

                    
                          
                    
                      echo "</div>
                        </div>
                      </div>
                    </div>
                    ";
                  
                  
      }

      ?>

      

      <?php

        // admin priviledges ONLY
        if($privileges == 1500) {

          // manage application 
          echo "<div class='accordion' id='accordionExample'>
                <div class='card'>
                  <div class='card-header' id='headingOne' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                    <h2 class='mb-0'>
                        <button type='button' class='btn btn-outline-success'>
                            Applications 
                            <span class='badge badge-light'>
                                $count
                            </span>
                        </button>
                        <div class='float-right'>
                          <button class='btn btn-link' id='h1drop' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                            <i class='icon-up-open' id='arrow1'></i>
                          </button>
                        </div>
                    </h2>
                  </div>

                  <div id='collapseOne' class='collapse' aria-labelledby='headingOne' data-parent='#accordionExample'>
                    <div class='card-body'>";
                    
                    if($count == 0) {
                      echo "<div class='row justify-content-center'>
                              <p>There are no new applications</p>";
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
                                <td class='text-center'><button type='submit' class='btn btn-outline-success' name='acceptapp'><i class='icon-ok-circled'></i></button></td>
                              </form>
                                <form action='adminprocess.php' method='POST'>
                                <input type='hidden' value='$id' name='rowid'/>
                                <td class='text-center'><button type='submit' class='btn btn-outline-danger' name='declineapp'><i class='icon-cancel-circled'></i></button></td>
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
          echo "<div class='accordion' id='accordionExample'>
          <div class='card'>
          <div class='card-header' id='headingTwo'>
            <h2 class='mb-0'>
                <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                  Allocate Time Slots 
                  <span class='badge badge-light'>
                    $counttimealocate
                  </span>
                </button>
                <div class='float-right'>
                  <button class='btn btn-link' id='h2drop' type='button' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                    <i class='icon-up-open' id='arrow2'></i>
                  </button>
                </div>
            </h2>
          </div>

          <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionExample'>
          <div class='card-body'>";

            if($counttimealocate == 0) {
              echo "<div class='row justify-content-center'>
                      <p>All artists have been allocated a time slot</p>";
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

                    $performance = "SELECT * FROM BPERFORMANCE 
                    INNER JOIN BTIME ON fk_time_id = pk_time_id                  
                    INNER JOIN BDATE ON fk_date_id = pk_date_id                                   
                    INNER JOIN BVENUE ON fk_venue_id = pk_venue_id";
                    $readperformance = $conn->query($performance);

                    while ($row = $resultreadtime->fetch_assoc()) {
                      
                      $artist = $row['name'];
                      $artistid = $row['pk_artist_id'];
                      // select date
                      echo "<tr>
                              <form action='adminprocess.php' method='POST'>
                              <td scope='row'>
                                <select class='form-control overflow-auto' name='perfid'>
                                
                                  <option value=''>Default select</option>";

                                  $perf = "SELECT * FROM BPERFORMANCE 
                                  INNER JOIN BTIME ON fk_time_id = pk_time_id                  
                                  INNER JOIN BDATE ON fk_date_id = pk_date_id                                   
                                  INNER JOIN BVENUE ON fk_venue_id = pk_venue_id";
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
                              </td>";

                              echo 
                              "
                              <td>$artist</td>
                                <input type='hidden' value='$artistid' name='artistid'/>
                                <td class=''><button type='submit' class='btn btn-outline-success' name='allocatetime'><i class='icon-ok-circled'></i></button></td>
                              </form>
                            </tr>";

                              // select venue
                              // echo "
                              // <td scope='row'>
                              //   <select class='form-control overflow-auto' name='venueref'>
                              //     <option value=''>Default select</option>";

                              // $venue = "SELECT * FROM BVENUE";
                              // $readvenue = $conn->query($venue);

                              // while($row = $readvenue->fetch_assoc()) {
                              //   $venue = $row['venue_name'];
                              //   $vid = $row['pk_venue_id'];

                              //   echo "<option value='$vid'>$venue</option>";
                              // }

                              // echo "</select>
                              // </td>";

                              // select time slot
                              // echo "
                              // <td scope='row'>
                              //   <select class='form-control overflow-auto' name='venueref'>
                              //     <option value=''>Default select</option>";

                              // $slot = "SELECT * FROM BTIME";
                              // $readslot = $conn->query($slot);

                              // while($row = $readslot->fetch_assoc()) {
                              //   $tid = $row['pk_time_id'];
                              //   $start = $row['start_time'];
                              //   $startdisp = date('g:ia', strtotime("$start"));
                              //   $end = $row['end_time'];
                              //   $enddisp = date('g:ia', strtotime("$end"));

                              //   echo "<option value='$tid'>$startdisp - $enddisp</option>";
                              // }
                              // echo "</select>
                              // </td>";            
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
    echo "<div class='accordion' id='accordionExample'>
    
        <div class='card'>
          <div class='card-header' id='headingFour'>
            <h2 class='mb-0'>
                <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' data-target='#collapseFour' aria-expanded='true' aria-controls='collapseFour'>";
                    

                      if($privileges == 1500) {
                          echo "Manage Artists 
                                <span class='badge badge-light'>
                                  $countartists
                                </span>";
                      }

                      if($privileges == 1501) {
                        echo $display;
                      }

                      if($privileges == 1502) {
                        echo "View Your Schedule
                        <span class='badge badge-light'>
                          -
                        </span>";
                      }

                    
                
                echo "</button>
                <div class='float-right'>
                  <button class='btn btn-link' id='h4drop' type='button' data-toggle='collapse' data-target='#collapseFour' aria-expanded='true' aria-controls='collapseFour'>
                    <i class='icon-up-open' id='arrow4'></i>
                  </button>
                </div>
            </h2>
          </div>

        <div id='collapseFour' class='collapse";if($privileges == 1501){ echo"show'";} else { echo "";} echo "' aria-labelledby='headingFour' data-parent='#accordionExample'>
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

                        if ($privileges == 1501) {
                          echo "<div class='row scrollmenu'>
                            <table class='table table-hover'>
                              <thead>
                                <tr>
                                  <th class='text-center' scope='col'>Edit Info</th>
                                  <th class='text-center' scope='col'>Edit Members</th>
                                  <th scope='col'>Latest Release</th>
                                </tr>
                              </thead>
                              <tbody>";
                        }

                        if($privileges == 1500) {
                        
                        while ($row = $resultreadartist->fetch_assoc()) {
                          $artistid = $row['pk_artist_id'];
                          $arttime = $row['fk_performance_id'];
                          $name = $row['name'];

                          // echo "<tr>
                          // <td scope='row'>$name</td>
                          // <td class=''><button type='submit' class='adminbutton' data-toggle='modal'data-id='$artistid' data-target='#exampleModalCenter'><i class='icon-cancel-circled applicationcross'></i>$artistid</button></td>
                          // </tr>";
                          
                          
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
                                <form action='adminprocess.php' method='POST'>
                                <input type='hidden' value='$artistid' name='rowid'/>
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
                      
                      if($privileges == 1501) {

                        while($row = $readartresult->fetch_assoc()) {
                          $artid = $row['pk_artist_id'];
                        echo "
                                        <form action='editartist.php' method='POST'>
                                        <input type='hidden' value='$artid' name='rowid'/>
                                        <td class='text-center'><button type='submit' class='btn btn-outline-secondary' name='editartistinfo'><i class='icon-edit'></i></button></td>
                                        </form>
      
                                        <form action='editmembers.php' method='POST'>
                                        <input type='hidden' value='$artid' name='rowid'/>
                                        <td class='text-center'><a href='editartist.php'><button type='submit' class='btn btn-outline-secondary' name='editartistmember'><i class='icon-edit'></i></button></a></td>
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

                      if($privileges == 1502) {

                        echo "<div class='row scrollmenu'>
                            <table class='table table-hover'>
                              <thead>
                                <tr>
                                  <th class='text-center' scope='col'>Edit Info</th>
                                  <th class='text-center' scope='col'>Edit Members</th>
                                  <th scope='col'>Latest Release</th>
                                </tr>
                              </thead>
                              <tbody>";

                        $showuserschedule = "SELECT * FROM BUSCHEDULE
                        INNER JOIN BPERFORMANCE ON BUSCHEDULE.fk_performance_id = BPERFORMANCE.pk_performance_id
                        INNER JOIN BARTIST ON BPERFORMANCE.pk_performance_id = BARTIST.fk_performance_id
                        INNER JOIN BDATE ON BPERFORMANCE.fk_date_id = BDATE.pk_date_id
                        INNER JOIN BTIME ON BPERFORMANCE.fk_time_id = BTIME.pk_time_id
                        INNER JOIN BVENUE ON BPERFORMANCE.fk_venue_id = BVENUE.pk_venue_id
                        WHERE BUSCHEDULE.fk_account_id = $sessiondetails";

                        $runshowuser = $conn->query($showuserschedule);

                        while($row = $runshowuser->fetch_assoc()) {
                          $start = $row['start_time'];
                          $startdisp = date('g:ia', strtotime("$start"));
                          $end = $row['end_time'];
                          $enddisp = date('g:ia', strtotime("$end"));
                          $artist = $row['name'];
                          $venue = $row['venue_name'];
                          $id = $row['pk_artist_id'];

                          echo "<tr>
                                  <td>$startdisp</td>
                                  <td>$enddisp</td>
                                  <td>$artist</td>
                                </tr>";

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
        echo "<div class='accordion' id='accordionExample'>
                <div class='card'>
                  <div class='card-header' id='headingFour'>
                    <h2 class='mb-0'>
                    <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' 
                    data-target='#collapseSix' aria-expanded='true' aria-controls='collapseSix'>";
                    
                      if($privileges == 1500) {
                        echo "Manage Users 
                                <span class='badge badge-light'>
                                  $countusers
                                </span>";
                      }

        echo "</button>
                <div class='float-right'>
                  <button class='btn btn-link' id='h6drop' type='button' data-toggle='collapse' data-target='#collapseSix' 
                  aria-expanded='true' aria-controls='collapseSix'>
                    <i class='icon-up-open' id='arrow6'></i>
                  </button>
                </div>
              </h2>
            </div>

            <div id='collapseSix' class='collapse' aria-labelledby='headingSix' data-parent='#accordionExample'>
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

                          if($username == $display) {

                          } else {

                          echo"<form action='userprocess.php' method='POST'>
                          <td scope='row'>$useremail</td>";


                          if($accprivilege == 1501) {
                            echo "<td scope='row'>$privname</td>
                                  <td></td>
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
                                        <input type='hidden' value='$accid' name='rowid'/>
                                        <input type='button' class='btn btn-outline-secondary' data-dismiss='modal' value='Close'>
                                        <input type='submit' class='btn btn-outline-danger' name='deleteuser' value='Yes'>
                                      </form>
                                    </div>";

                          } else {

                            echo "<td>
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
                                <td><input type='submit' class='btn btn-outline-success float-center' name='updateprivileges' value='Update'></td>
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

        echo "<div class='accordion' id='accordionExample'>
                <div class='card'>
                  <div class='card-header' id='headingThree'>
                    <h2 class='mb-0'>
                      <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                        News Carousel
                        <span class='badge badge-light'>
                          $newscount
                        </span>
                      </button>
                      <div class='float-right'>
                        <button class='btn btn-link' id='h3drop' type='button' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                          <i class='icon-up-open' id='arrow3'></i>
                        </button>
                      </div>
                    </h2>
                  </div>

                  <div id='collapseThree' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionExample'>
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
                                          <a href='$url' class='btn btn-outline-info justify-content-end disabled' aria-disabled='true'>See More</a>
                                          <div class='row'>
                                            <form class='col' action='adminnews.php' method='POST'>
                                              <input type='hidden' value='$news' name='newsidedit'/>
                                              <button type='submit' class='d-inline btn btn-outline-secondary float-right' name='editnewsstory'><i class='icon-edit'></i></button>
                                            </form>
                                                                          
                                            <form class='col' action='newseditprocess.php' method='POST'>
                                              <input type='hidden' value='$news' name='newsid'/>
                                              <button type='submit' class='d-inline btn btn-outline-danger float-left' name='deletestory'><i class='icon-cancel-circled'></i></button>
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

        echo "<div class='accordion' id='accordionExample'>
                <div class='card'>
                  <div class='card-header' id='headingThree'>
                    <h2 class='mb-0'>
                      <button type='button' class='btn btn-outline-success' type='button' data-toggle='collapse' data-target='#collapseFive' aria-expanded='true' aria-controls='collapseFive'>
                      Home Page Content
                      </button>
                      <div class='float-right'>
                        <button class='btn btn-link' id='h5drop' type='button' data-toggle='collapse' data-target='#collapseFive' aria-expanded='true' aria-controls='collapseFive'>
                          <i class='icon-up-open' id='arrow5'></i>
                        </button>
                      </div>
                    </h2>
                  </div>

        
                  <div id='collapseFive' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionExample'>
                    <div class='card-body'>";

                      $homepage = "SELECT * FROM BFESTIVAL WHERE pk_fest_id = 1";
                      $readhomepage = $conn->query($homepage);

                      $row = $readhomepage->fetch_assoc();
                      $pagetitle = $row['fest_pagetitle'];
                      $fest_description = $row['fest_description'];
                              
                      echo" <form action='adminprocess.php' method='POST'>
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

      ?>
  
      </div>                 

    <!-- footer -->
    <?php
      include("../modules/footeredit.html");
    ?>

  </body>
</html>