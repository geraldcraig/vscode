<?php

  include("dbconn.php");

  $read = "SELECT * FROM mypopulation";

  $result = $conn->query($read);

  if(!$result) {
      echo $conn->error;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>USA Population Demo</title>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  </head>

  <body>
    <div class="container">

      <h1>USA State Population Details</h1>

      <table class="table striped">
        <thead>
        <tr>
            <th>State</th>
            <th>2018</th>
            <th>2019</th>
            <th>2020</th>
        </tr>
        </thead>
        <tbody>
          <?php
              while($row = $result->fetch_assoc()){
                
                  echo "<tr>
                          <td>{$row['statename']}</td>
                          <td>{$row['pop2018']}</td>
                          <td>{$row['pop2019']}</td>
                          <td>{$row['pop2020']}</td>
                      </tr>";
              }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
