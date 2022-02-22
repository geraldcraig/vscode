<?php
 
    $endpoint = "http://localhost/webdev/week12/simpleapi/myapi.php?read";
 
    $result = file_get_contents($endpoint);
 
    $data = json_decode($result, true);
 
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Simple API Request</title>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
  </head>
 
  <body>
    <div class="container">
        <h1>MyAPI Request</h1>
        <table class="table striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Car Reg</th>
                    <th>Start Date</th>
                    <th>Num Days</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {
                   
                        echo "<tr>
                               <td>{$row['name']}</td>
                               <td>{$row['car']}</td>
                               <td>{$row['startdate']}</td>
                               <td>{$row['days']}</td>
                           </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
   
    <!-- Metro 4 -->
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  </body>
</html>
 
</body>
</html>
