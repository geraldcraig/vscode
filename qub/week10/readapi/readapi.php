<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
    <title>Read API Demo</title>
</head>

<body>
    <h1>10 Random Picsum Images</h1>

    <?php
            // get a random number for the page
            $rand = rand(1, 10);

            // path for the API (random page, limit to 10 photos)
            $apipath = "https://picsum.photos/v2/list?page={$rand}&limit=10";

            // get the contents of the API (JSON)
            $apijson = file_get_contents($apipath);

            // decode the JSON string into an array
            $arrayapi = json_decode($apijson, true);

            //print_r($arrayapi);

            // Iterate and display
            foreach ($arrayapi as $row) {

                $imgurl = $row["download_url"];
                echo "<img src='{$imgurl}' width='100px'> ";
            }
        ?> 
</body>
</html>

