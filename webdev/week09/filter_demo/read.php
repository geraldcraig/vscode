<?php

    include("dbconn.php");

    $selectquery = "SELECT * FROM myrankings";

    $result = $conn->query($selectquery);

    if(!$result) {
        echo $conn->error;
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Filter Demo</title>
  </head>

  <body>

    <div class="container-fluid">

        <h1>University Rankings</h1>

        <?php 

            echo " <table class='table'> 
                    <thead>
                        <tr>
                            <th scope='col'># Ranking</th>
                            <th scope='col'>University Name</th> 
                            <th scope='col'>Country</th>  
                        </tr>
                    </thead>
                    <tbody>
                ";

            
            while ($row = $result->fetch_assoc()) { 
                $ranking = $row["unirank"];
                $university = $row["uniname"];
                $country = $row["unicountry"];

                echo "<tr>
                           <th scope='row'> {$ranking} </th> 
                            <td>{$university}</td>
                            <td>{$country}</td>
                        </tr>";
            }
            
            echo "</tbody></table>";
        ?>
 
    </div>

    <!-- jQuery and Bootstrap Bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>