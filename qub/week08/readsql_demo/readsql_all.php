<?php
        $host = "localhost";
        $user = "testuser";
        $pw = "password";
        $db = "mytestdb";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Read All Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
<body>
    <h1>Kaggle Datasets (SQL)</h1>

    <?php

        // create query
        //$read = "SELECT * FROM mykaggledataset ";

        $table = "mykaggledataset";
        $read = "SELECT * FROM {$table} ";

        // get result set
        $result = $conn -> query($read);

        // check result exists
        if (!$result) {
            echo $conn -> error;
        }

        // iteration and echo
        while ($row = $result->fetch_assoc()){
 
            // dump out content of the line
            //print_r($row);

            // echo out content from each row
            echo "<blockquote>
                  <p>
                    <a href='{$row['url']}' target='_blank'>{$row['url']}</a>
                    <h4> Rating {$row['rating']}</h4>
                    <p>Total column size: {$row['totalcols']}</p>
                    </p>
                  </blockquote>";
         }
    ?>
 
</body>
</html>