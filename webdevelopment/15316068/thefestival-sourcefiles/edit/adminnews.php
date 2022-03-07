<?php

session_start();

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

include("../conn.php");

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
}

if (empty($news = $_POST['newsidedit'])) {
  header("Location: admin.php");
  exit();

} 

if($privileges != 1500) {
  header("Location: admin.php");
  exit();
}

$editnews = $_POST['newsidedit'];

$read = "SELECT * FROM BAPPLICATION";
$result = $conn->query($read);

$readnews = "SELECT * FROM BNEWS";
$newsresults = $conn->query($readnews);

$count = mysqli_num_rows($result);
$newscount = mysqli_num_rows($newsresults);

$readtime = "SELECT * FROM BARTIST WHERE fk_performance_id IS NULL";
$resultreadtime = $conn->query($readtime);

$counttimealocate = mysqli_num_rows($resultreadtime);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit News | B Festival</title>
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
                <span class="badge badge-light">
                  
                  <?php
                    echo $newscount;
                  ?>
                </span>
                News Carousel
              <div class="float-right">
                <button class="btn btn-link text-info" id="h3drop" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="newsCarousel">
                  <i class="icon-up-open" id="arrow3"></i>
                </button>
              </div>
            </h2>
          </div>

          <!-- section 1 content (News Contents) -->
          <div id="collapseThree" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <div class='row'>
                <table class='table table-hover'>
                  <thead>
                    <tr>
                      <th scope='col'>News</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="text-center">
                      <td><a href="adminedit.php"><i class='addnews icon-plus-circled'></i></a></td>
                    </tr>

                    <?php

                      while($row = $newsresults->fetch_assoc()) {
                                
                        $news = $row['news_id'];
                        $type = $row['type'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $url = $row['url'];
                        $date = $row['created'];

                          if($news == $editnews) {
                            
                            echo "<tr class='text-center'>
                                    <td>
                                      <form action='newseditprocess.php' method='POST'>
                                        <input type='hidden' value='$news' name='newsid'/>
                                        <div class='card-header'>
                                          <input type='text' class='form-control' name='newstypeedit' value='$type' aria-label='Username' aria-describedby='basic-addon1'>
                                        </div>
                                        <div class='card-body' id='newscards'>
                                          <h5 class='card-title'><input type='text' class='form-control' name='newstitleedit' value='$title' aria-label='News Title' aria-describedby='basic-addon1'></h5>
                                          <p class='card-text'><textarea type='text' class='form-control' name='newsbodyedit' aria-label='News Body' aria-describedby='basic-addon1'>$content</textarea></p>
                                        </div>
                                          <div class='card-footer'><input type='text' class='form-control' name='seemorelinkedit' value='$url' aria-label='URL goes here' aria-describedby='basic-addon1'>
                                        
                                        <div class='row float-right'>
                                        <button type='submit' class='btn btn-outline-success mt-4 mr-1' name='updatenewsstory'><i class='icon-ok-circled'></i></button>
                                        <button type='submit' class='btn btn-outline-danger mt-4' name='cancelnews'><i class='icon-cancel-circled'></i></button>
                                        </div>
                                      </form> 
                                      
                                      </div>
                                    </td>
                                  </tr>";

                          } else {

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
                                      <form action='adminnews.php' method='POST'>
                                        <input type='hidden' value='$news' name='newsidedit'/>
                                        <button type='submit' class='d-inline btn btn-outline-secondary mt-1 mr-1' name='editnewsstory'><i class='icon-edit'></i></button>
                                      </form>
                                      <form action='deletenewsprocess.php' method='POST'>
                                        <input type='hidden' value='$news' name='newsid'/>
                                        <button type='submit' class='d-inline btn btn-outline-danger mt-1' name='deletestory'><i class='icon-cancel-circled applicationcross'></i></button>
                                      </form>
                                      </div>
                                    </td>  
                                  </tr>";
                          }
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
      include("../modules/footeredit.html");
    ?>

  </body>
</html>