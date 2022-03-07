<?php

session_start();

include("../conn.php");

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
}

if (empty($artist = $_POST['rowid'])) {
  header("Location: admin.php");
  exit();

} 


$artist = $_POST['rowid'];

$readartists = "SELECT * FROM BARTIST WHERE pk_artist_id = $artist";
$resultreadartist = $conn->query($readartists);

$row = $resultreadartist->fetch_assoc();
$artistid = $row['pk_artist_id'];
$name = $row['name'];

$readmembers = "SELECT * FROM BMEMBER WHERE fk_artist_id = $artist";
$readmemberprocess = $conn->query($readmembers);

$instrument = "SELECT * FROM BINSTRUMENT ORDER BY instrument ASC";
$instrumentget = $conn->query($instrument);

$member = "SELECT * FROM BMEMBER 
INNER JOIN BINSTRUMENT ON fk_instrument_id = pk_instrument_id WHERE 
fk_artist_id = $artist";
$getmember = $conn->query($member);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Member | B Festival</title>
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
      include("../modules/navbaredit.php");

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
              </h1>
            </div>

            <div id='collapseFour' class='collapse show' aria-labelledby='headingFour' data-parent='#accordionExample'>
              <div class='card-body'>
                <div class='row'>
                  <table class='table table-hover'>
                    <thead>
                      <tr>
                        <th scope='col'>Band Members</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>

                        <?php

                          while($row = $getmember->fetch_assoc()) {
                            $instrument = $row['instrument'];
                            $memname = $row['member_name'];
                            $artid = $row['fk_artist_id'];
                            $memid = $row['pk_member_id'];
                                
                            echo "<td>
                                    <div class='form-row'>
                                      <div class='form-group col-5'>
                                        $instrument
                                      </div>
              
                                      <div class='form-group col-5'>
                                      $memname
                                      </div>

                                      <div class='form-group col-2'>
                                        <form action='memberprocess.php' method='POST'>
                                          <input type='hidden' value='$artid' name='artid'/>
                                          <input type='hidden' value='$memid' name='memid'/>
                                          <button type='submit' class='btn btn-outline-danger float-right' name='removemember'><i class='icon-cancel-circled'></i></button>
                                        </form>
                                      </div>
                                    </div>
                                  </td>
                                </tr>";
                                
                                
                          }
                            
                          echo " <tr>
                                    <td><div class='p-3 mb-2 bg-light text-dark'>Add a new band member</div></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <form action='addmemberprocess.php' method='POST'>
                                        <div class='form-row'>
                                        <div class='form-group col-5'>
                                        <select class='form-control overflow-auto' name='instrumentref' required>
                                          <option value=''>Instrument</option>";
                                            
                                            while($row = $instrumentget->fetch_assoc()) {
                                              $id = $row['pk_instrument_id'];
                                              $inst = $row['instrument'];

                                              echo "<option value='$id'>$inst</option>";
                                              }

                                  echo "</select>
                                      </div>
                                      <div class='form-group col-5'>
                                        <input type='text' class='form-control' name='membername' id='membername' aria-describedby='membername' required>
                                      </div>

                                      <div class='form-group col-2 text-center'>
                                        <input type='hidden' value='$memid' name='memid'/>
                                        <input type='hidden' value='$artist' name='artid'/>
                                        <button type='submit' class='btn btn-outline-success float-right' name='addamember'><i class='icon-ok-circled'></i></button>
                                      </div>
                                      </form>
                                    </div>
                                  </td>
                                </tr>";
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
      include("../modules/footeredit.html");
    ?>

  </body>
</html>