<?php
    $endpoint = "https://jsonplaceholder.typicode.com/todos?id=3";
 
    $jsonstring = file_get_contents($endpoint);
 
    $arraydata = json_decode($jsonstring, true);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Read</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
</head>
<body>
    <h1>API Read</h1>

    <?php

        foreach ($arraydata as $row) {

            $listid = $row['id'];
            $listitem = $row['title'];
            $itemstatus = $row['completed'];

            echo "<div><h3>Number: $listid</h3>
                <blockquote>
                <p>Item: $listitem</p>";

                if ($itemstatus == 1) {
                    echo "<em>Status: complete</em>";
                } else {
                    echo "em>Status: incomplete</em>";
                }

                echo "</blockquote></div>";
        }
    ?>
 
</body>
</html>