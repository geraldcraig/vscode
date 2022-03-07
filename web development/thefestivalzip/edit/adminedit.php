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

// if($privileges != 1500) {
//   header("Location: admin.php");
//   exit();
// }

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

    <title>Login | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

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
        <a type='button' href='/thefestival/edit/admin.php'class='btn btn-light text-uppercase'><i class='icon-left-open'></i>Back</a>
        <!-- accordian header section Add/Edit News Stories -->
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button type="button" class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="newsCarousel">
                News Carousel
                <span class="badge badge-light">
                  
                  <?php
                    echo $newscount;
                  ?>

                </span>
              </button>
              <div class="float-right">
                <button class="btn btn-link" id="h3drop" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="newsCarousel">
                  <i class="icon-up-open" id="arrow3"></i>
                </button>
              </div>
            </h2>
          </div>

          <!-- section accordian content section Add/Edit News Stories -->
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
                      <td>
                        <form action="newseditprocess.php" method="POST">
                          <div class='card-header'>
                            <input type="text" class="form-control" name="newstype" placeholder="News Type" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <div class='card-body' id='newscards'>
                            <h5 class='card-title'><input type="text" class="form-control" name="newstitle" placeholder="News Title" aria-label="News Title" aria-describedby="basic-addon1"></h5>
                            <p class='card-text'><textarea type="text" class="form-control" name="newsbody" placeholder="News Body" aria-label="News Body" aria-describedby="basic-addon1"></textarea></p>
                            <input type="text" class="form-control" name="seemorelink" placeholder="URL goes here" aria-label="URL goes here" aria-describedby="basic-addon1">
                          </div>
                            <button type='submit' class='btn btn-outline-success' name='addnewsstory'><i class='icon-ok-circled'></i></button>
                            <button type='submit' class='btn btn-outline-danger' name='cancelnews'><i class='icon-cancel-circled'></i></button>
                        </form>
                      </td>
                    </tr>

                    <?php

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
                                  </div>
                                  <form class='col'action='adminnews.php' method='POST'>
                                    <input type='hidden' value='$news' name='newsidedit'/>
                                    <button type='submit' class='d-inline btn btn-outline-secondary float-right' name='editnewsstory'><i class='icon-edit'></i></button>
                                  </form>
                                  <form class='col'action='newseditprocess.php' method='POST'>
                                    <input type='hidden' value='$news' name='newsid'/>
                                    <button type='submit' class='d-inline btn btn-outline-danger float-right mr-3' name='deletestory'><i class='icon-cancel-circled'></i></button>
                                  </form>
                                </td>   
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
      include("../modules/footeredit.html");
    ?>

  </body>
</html>