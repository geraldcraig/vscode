<?php

    $endpoint = "https://jsonplaceholder.typicode.com/comments";

    $response = file_get_contents($endpoint);

    $comments = json_decode($response, true);

    // print_r($comments);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meat name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>API call</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.3.min.css"/>

</head>
<body>
    <h1>External API request</h1>
    <h2><Blockquote></h2>
    <blockquote>
        Use this to emphasize a quote
        <footer>&mdash; Author Name, Publication</footer>
    </blockquote>

    <?php

        foreach($comments as $row) {

            echo "<h2>{$row['name']}</h2>";

            echo " <blockquote>
                    {$row["body"]}
                    <footer>
                    <a href='mailto:{$row["email"]}'>
                        {$row["email"]}
                    </a>
                    </footer>  
                </blockquote> ";
        }

    ?>

</body>
</html>