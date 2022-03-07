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

$readrelease = "SELECT * FROM BRELEASE WHERE fk_artist_id = $artist";
$resultreadresult = $conn->query($readrelease);


$row = $resultreadresult->fetch_assoc();
$albumtitle = $row['title'];
$albumimage = $row['img'];
$releasemonth = $row['release_month'];
$releaseyear = $row['release_year'];


$row = $resultreadartist->fetch_assoc();
$artistid = $row['pk_artist_id'];
$name = $row['name'];
$bio = $row['bio'];
$intro = $row['intro'];
$url = $row['url'];
$video = $row['video'];


$countrelease = mysqli_num_rows($resultreadresult);


?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Release | B Festival</title>
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
    <script src="../scripts/applyform.js"></script>

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
                      
              echo "<form action='releaseprocess.php' method='POST' enctype='multipart/form-data' novalidate>
                      <div class='p-3 mb-2 bg-light text-dark'>Latest Release</div>
                        <div class='form-row'>
                          <div class='form-group col'>
                            <label for='inputEmail4'>Upload an Album Image</label>
                            <div class='custom-file'>
                              <input type='file' class='custom-file-input' id='inputGroupFile02' name='bandimage'>
                              <label class='custom-file-label overflow-auto' for='inputGroupFile02' aria-describedby='inputGroupFileAddon02'>Choose file</label>
                            </div>
                          </div>
                        </div>
                            
                        <div class='form-row'>
                          <div class='form-group col'>
                            <label for='inputEmail4'>Album Name</label>
                            <input type='text' class='form-control' name='albumtitle' value='$albumtitle' required>
                          </div>
                        </div>

                        <div class='p-3 mb-2 bg-light text-dark'>Release Date</div>
                          <div class='form-row'>
                            <div class='form-group col-md-6'>
                              <label for='inputEmail4'>Month</label>
                              <input type='text' class='form-control' name='releasemonth' value='$releasemonth' required>
                            </div>
                            <div class='form-group col-md-6'>
                              <label for='inputEmail4'>Year</label>
                              <input type='text' class='form-control' name='releaseyear' value='$releaseyear' required>
                            </div>
                          </div>
                          <input type='hidden' name='artistid' value='$artistid'>      
                          <td class=''><input type='submit' class='btn btn-outline-success' name='updateartistrelease' value='Add'></td>
                          <td class=''><a href='admin.php'><button type='submit' class='btn btn-outline-secondary' name='cancelupdate'>Cancel</button></a></td>
                        </div>
                      </div>
                    </form>";

            ?> 

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