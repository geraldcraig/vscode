<?php

    $filename = "data/kaggleurls.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV File Read Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
<body>
    <h1>Kaggle Datasets</h1>

    <?php

        // loop to read each line from CSV file into $row array
        while ( ($row = fgetcsv($contents)) !== FALSE ) {

            // dump out content of the line
            //print_r($row);

            // echo out content from each line
            echo "<blockquote>
                    <p>
                    <a href='{$row[0]}' target='_blank'>{$row[0]}</a>
                    <h4> Rating {$row[1]}</h4>
                    <p>Total column size: {$row[2]}</p>
                    </p>
                </blockquote>";

        }
    ?>
 
</body>
</html>

