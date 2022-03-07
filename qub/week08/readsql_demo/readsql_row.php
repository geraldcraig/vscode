<?php

    // include database connection file
    include("dbconn.php");
 ?>

<!DOCTYPE html>
<html lang="en">

<!--
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Read Row Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
-->

<?php
    include("pagehead.php");
?>

<body>
    <h1>Kaggle Datasets (SQL)</h1>

    <?php

        // create query
        $read = "SELECT * FROM mykaggledataset ";

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

            // read the id and url from each row
            $id = $row['id'];
            $url = $row['url'];
            
            // echo out the url and link to details.php page
            echo "<blockquote>
                  <a href='details.php?rowid=$id' target='_blank'>{$url}</a>
                  </blockquote>";

         }
    ?>
 
</body>
</html>