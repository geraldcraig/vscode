<?php

    $host = "localhost";
    $user = "testuser";
    $pw = "password";
    $db = "mytestdb";

    $conn = new mysqli($host, $user, $pw, $db);

    if ($conn -> connect_error) {

        $check = "Not connectd ".$conn -> connect_error;

    } else {

        $check = "Connected to MySQL DB.";
    }

    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>DB Connection Test</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
            <script defer src="https://use.fontawesome.com/release/v5.3.1/js/all.js"></script>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">

            <?php
                echo $check
            ?>

        </h1>
    
    <div>
</section>
</body>
</html>

