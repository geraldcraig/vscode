<?php

    include("dbconn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Read & Insert Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
<body>
    <h1>Kaggle Datasets</h1>

    <?php
    
        // perform a select query to read the dataset
        $selectquery = "SELECT * FROM myinsertdataset";

        $result = $conn -> query($selectquery);

        if (!$result) {

            echo $conn->error;    

        } else {

            //print_r($result);

            if ($result -> num_rows == 0) {

                echo "<p>No data currently in database table!</p>";

            } else {

                // loop to read each row in the table
                while ($row = $result->fetch_assoc()) {

                    // dump out content of the line
                    //print_r($row);

                    // obtain contents of the associative array
                    $url = $row['kagglelink'];
                    $rating = $row['rating'];
                    $cols = $row['totalcols'];

                    // echo out content from each line
                    echo "<blockquote>
                            <p>
                            <a href='{$url}' target='_blank'>{$url}</a>
                            <h4> Rating {$rating}</h4>
                            <p>Total column size: {$cols}</p>
                            </p>
                            </blockquote>";

                }

            }
        }
    ?>
 
</body>
</html>

