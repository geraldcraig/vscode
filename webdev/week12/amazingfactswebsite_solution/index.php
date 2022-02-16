<?php

    $endpoint = "http://localhost/amazingfactsapi/api.php";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Amazing Facts</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
 
<body>
 
 <div class="container">
 
        <div class="row">
                <div class="column"><h1>Some Amazing Facts</h1></div>
        </div>

        <div class="row">
                <div class="column">
                        <a class="button" href="myfact.php">Insert a fact</a>
                </div>
        </div>
   
        <div class="row">
                <div class="column">
               
                <ul>
                    <?php
                        foreach ($data as $row) {
                            
                            $fact = $row['fact'];
                            echo " <li>$fact</li> ";   
   
                        }
                    ?>
                </ul>
         
                </div>
        </div>
         
 </div>
 
</body>
</html>