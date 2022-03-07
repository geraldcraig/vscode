<?php

session_start();

include("../conn.php");

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../admin.php");
  exit();
}

if(!isset($_POST['rowid'])) {
  header("Location: admin.php");
} else {
  $artist = $_POST['rowid'];
}

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Change Password | B Festival</title>
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
                  echo $display;
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
                <div class="p-3 mb-2 bg-light text-dark"> Change Password</div>

                <form action="changepasswordprocess.php" method="POST">
                    <div class="form-row mb-2">
            
                        <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control 
                            overflow-auto" id="password" name="newchangepassword" 
                            placeholder="New password">
                        </div>
                    </div>

                    <div class="form-row mb-2">
                    
                        <label for="inputPassword" class="col-sm-2 col-form-label">Verify Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control 
                            overflow-auto" id="passwordverify" name="changepasswordverify" 
                            placeholder="Verify Password">
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="submit" class="btn btn-outline-success input-group-btn" name='changepassword' value="Change Password">
                    </div>
                </form>
              
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