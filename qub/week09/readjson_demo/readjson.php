<?php

    $urltojson="data/kaggleurls.json";

    // get the resource object (open the JSON file and get the contents)
    $contents = file_get_contents($urltojson);

    //print_r($contents);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Read Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
 
</head>
<body>
    <h1>JSON Dataset</h1>

    <?php

        // convert JSON object to PHP object (array)
        $mydata = json_decode($contents, true);

        // iterate and use the data
        foreach($mydata as $row) {
    
            //print_r($row);
    
            $url_data = $row['url'];
            $user_rating = $row['rating'];
            $columns = $row['user_score'];

            // echo out content from each line
            echo "<blockquote>
                <p>
                <a href='{$url_data}' target='_blank'>{$url_data}</a>
                <h4> Rating {$user_rating}</h4>
                <p>Total column size: {$columns}</p>
                </p>
                </blockquote>";
        }

    ?>

</body>
</html>