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

// if($privileges != 1500 || 1501) {
//   header("Location: admin.php");
//   exit();
// }

$deleterelease = $_POST['removerelease'];
$artistid = $_POST['rowid'];

$read = "SELECT * FROM BRELEASE INNER JOIN BARTIST ON fk_artist_id = pk_artist_id 
INNER JOIN BGENRE ON fk_genre_id = pk_genre_id WHERE fk_artist_id = $artistid";
$result = $conn->query($read);

$readartist = "SELECT * FROM BARTIST WHERE pk_artist_id = $artistid";
$readartresult = $conn->query($readartist);

$readrelease = "SELECT * FROM BRELEASE WHERE fk_artist_id = $artistid";
$resultreadresult = $conn->query($readrelease);

$countrelease = mysqli_num_rows($resultreadresult);


?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Releases | B Festival</title>
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
        <!-- accordian section 3 (News Stories) -->
        <div class="card">
          <div class="card-header" id="headingThree">
          <h1 class='mb-0 text-info admin mt-1'>
              
                <?php

                  $row = $readartresult->fetch_assoc();
                  $name = $row['name'];
                  echo $name;
                ?>
                  
              <div class="float-right">
                <button class="btn btn-link text-info" id="h3drop" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  <i class="icon-up-open" id="arrow3"></i>
                </button>
              </div>
            </h2>
          </div>

          <!-- section 1 content (News Contents) -->
          <div id="collapseThree" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <div class="p-3 mb-2 bg-light text-dark">Releases</div>
                <div class='row row justify-content-center'>

                  <?php

                    if($countrelease == 0) {

                      if($privileges == 1500) {

                        echo "<div class='col text-center justify-content-center'>
                                <p>This artist has not added any releases yet</p>
                              </div>";
                      }

                      if($privileges == 1501) {

                          echo "<div class='col text-center justify-content-center'>
                                  <p>You have not added any releases yet</p>
                                </div>";
                      }

                    } else {

                      while($row = $result->fetch_assoc()) {
                                
                        $rid = $row['pk_release_id'];
                        $img = $row['img'];
                        $title = $row['title'];
                        $releasem = $row['release_month'];
                        $releasey = $row['release_year'];
                        $genre = $row['genre'];
                        $name = $row['name'];

                        echo" <div class='card release m-2' style='width: 18rem;'>
                                <img src='../img/$img'class='card-img-top albums' alt='...'>
                                <div class='card-body'>
                                  <p class='card-text'><strong>Album :</strong> $title</p>
                                  <p class='card-text'><strong>Released :</strong> $releasem $releasey</p>
                                  <p class='card-text'><strong>Genre :</strong> $genre</p>
                                </div>
                                <form class='text-center mb-2' action='deletereleaseprocess.php' method='POST'>
                                  <input type='hidden' value='$rid' name='releaseid'/>
                                  <input type='submit' class='btn btn-outline-danger float-center' name='removerelease' value='Delete'>
                                </form>
                              </div>";      
                      }
                    }
                  ?>
                </div>
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