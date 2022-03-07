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
  header("Location: ../edit/admin.php");
  exit();

} 

$artist = $_POST['rowid'];

$readvenue = "SELECT * FROM BVENUE INNER JOIN BADDRESS ON 
fk_address_id = pk_address_id WHERE pk_venue_id = $artist";
$resultreadvenue = $conn->query($readvenue);

$row = $resultreadvenue->fetch_assoc();
$venueid = $row['pk_venue_id'];
$name = $row['venue_name'];
$bio = $row['venue_description'];
$intro = $row['venue_title'];
$capacity = $row['capacity'];
$street = $row['street'];
$city = $row['city'];
$postcode = $row['postcode'];
$map = $row['embed_google_map'];
$addressid = $row['fk_address_id'];

$countvenues = mysqli_num_rows($resultreadvenue);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Venue | B Festival</title>
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

                if($countvenues == 0) {
                  echo "<div class='row justify-content-center'>
                          <p>There are currently no artists to manage</p>
                        </div>";

                } else {

                  echo "<div class='p-3 mb-2 bg-light text-dark'>Venue Info</div>
                          <form action='editvenueprocess.php' method='POST' enctype='multipart/form-data' novalidate>
                        <div class='form-row'>
                        <div class='form-group col'>
                        <label for='inputEmail4'>Update your Bio Image</label>
                          <div class='custom-file'>
                            <input type='file' class='custom-file-input' id='inputGroupFile02' name='venueimage' required>
                            <label class='custom-file-label overflow-auto' for='inputGroupFile02' aria-describedby='inputGroupFileAddon02'>Choose file</label>";


                          echo "</div>
                          
                        </div>
                        </div>

                        <div class='form-row'>
                          <div class='form-group col-md-6'>
                            <label for='inputEmail4'>Venue Name</label>
                            <input type='text' class='form-control' name='venuename' value='$name'>
                          </div>
                          <div class='form-group col-md-6'>
                            <label for='inputEmail4'>Capacity</label>
                            <input type='text' class='form-control' name='venuecapacity' value='$capacity'>
                          </div>
                        </div>
                        <div class='form-row'>
                          <div class='form-group col-md-6'>
                            <label for='inputEmail4'>Intro</label>
                            <textarea type='text' class='form-control' name='venueintro' >$intro</textarea>
                          </div>
                          <div class='form-group col'>
                        <label for='inputEmail4'>Info</label>
                        <textarea type='text' class='form-control' name='venuebio'>$bio</textarea>
                      </div>
                    </div>
                    
                    <div class='p-3 mb-2 bg-light text-dark'>Address Details</div>
                    <div class='form-row'>
                      <div class='form-group col-md-4'>
                        <label for='inputEmail4'>Street</label>
                        <input type='text' class='form-control' name='street' value='$street'>
                        <label for='inputEmail4'>City</label>
                        <input type='text' class='form-control' name='city' value='$city'>
                        <label for='inputEmail4'>Post Code</label>
                        <input type='text' class='form-control' name='postcode' value='$postcode'>
                      </div>
                      
                      <div class='form-group col-md-8'>
                        <label for='inputEmail4'>Map (embeded format only)</label>
                        <input type='text' class='form-control' name='venuemap' value='$map'>
                        <div class='embed-responsive embed-responsive-1by1 mt-3 mb-3'>
                    $map
                    </div>
                      </div>
                    </div>
                    <div>
                    <input type='hidden' name='venueid' value='$venueid'>
                    <input type='hidden' name='addressid' value='$addressid'>       
                      <td class=''><input type='submit' class='btn btn-outline-success' name='updatevenue' value='Update'></td>
                      <td class=''><a href='admin.php'><button class='btn btn-outline-secondary' name='cancelvenue'>Cancel</button></a></td>
                    </div>
                  </form>";
                }
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