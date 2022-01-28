<?php

    // include connection PHP file
    include("dbconn.php");

    // use S_GET to retrieve rowid from the URL
    $rowid = $_GET['rowid'];
    
    // perform query on rowid
    $read = "SELECT * FROM mykaggledataset WHERE id = '$rowid' ";
    $result = $conn->query($read);

    if(!$result){
        echo $conn->error;
    }
?>

<!DOCTYPE html>
<html lang="en">

<!--
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Read Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
-->

<?php
    include("pagehead.php");
?>

<body>
    <h1>Kaggle Dataset Selected</h1>

    <?php

        // fetch single row based on rowid
        $row = $result->fetch_row();
           
        // dump out $row
        print_r($row);

        // get detail from $row
        $url = $row[1];
        $rating = $row[2];
        $totalcols = $row[3];

        // echo out details
        echo "<blockquote>
            <div><a href='{$url}'>{$url}</a>
            <h4> Rating {$rating}</h4>
            <p>Total column size: {$totalcols}</p>
            </div>
          </blockquote>";        
?>
</body>
</html>