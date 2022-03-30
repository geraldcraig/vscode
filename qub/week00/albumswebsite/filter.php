<?php

    include("functions.php");

    $endpoint = "http://localhost/qub/week00/albumsapi/api.php?artist";

    //$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?artist";
 
    $result = file_get_contents($endpoint);
         
    $data = json_decode($result, true);

    $filter = $_GET["sort"];

    //$endpointalbum = "http://localhost/qub/week00/albumsapi/api.php?filter";

    //$endpointalbum = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?filter";
 
    //$resultalbum = file_get_contents($endpoint);
         
    //$dataalbum = json_decode($resultalbum, true);

?>

<!doctype html>
<html lang="en">
<head>
  <title>Album Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>

  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="index.php">Record Website</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artist</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php

                  foreach ($data as $row) {

                  $item = $row['name'];
                  echo "<a href='filter.php?sort=$item' /a><option value='$item' >$item</option>";

                }
                
              ?>

              </div>
            </li>

          </ul>
      
        </div>
      </nav>

      <div class="container-fluid">
      
        <?php 

            $read_all = readrankingsfilter($filter); 
            //echo $read_all;
        ?>
 
      </div>

  
 
  </body>
</html>