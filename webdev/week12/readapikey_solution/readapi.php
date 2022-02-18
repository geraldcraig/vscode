<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css" />
    <title>NASA API Demo</title>
</head>

<body>
    <h1>NASA Astronomy Picture of the Day</h1>

    <?php

            // endpoint passing in API key as a parameter
            //$endpoint = "https://api.nasa.gov/planetary/apod";
            $endpoint = "https://api.nasa.gov/planetary/apod?api_key=xgGdIVZls9RpFDflegpUWib6qFwSZeol29iexhnC";


            // get the contents of the API (JSON)
            $jsonstring = file_get_contents($endpoint);

            //echo "<pre>";
            //var_dump($jsonstring);
            //echo "</pre>";

            // decode the JSON string into an array
            $array = json_decode($jsonstring, true);

            //echo "<pre>";
            //var_dump($array);
            //echo "</pre>";

            $imagename = $array['title'];
            $imagedesc = $array['explanation'];
            $imgurl = $array['url'];

            // display the data
            echo "<h3>$imagename</h3>
                  <img src='{$imgurl}' height='200px' width='200px'> 
                  <p>$imagedesc</p>";

                  

        ?> 
</body>
</html>

