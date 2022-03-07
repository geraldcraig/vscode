<?php

// connection file to database
include("conn.php");

// SQL query to return records from table 'renthouses' where id=1
$read = "SELECT * FROM renthouses WHERE id=1";
$result = $conn->query($read);

$row = $result->fetch_assoc();

// rows from database
$address = $row["address"];
$price = $row["price"];
$description = $row["description"];
$beds = $row["beds"];
$type = $row["type"];
$town = $row["town"];

?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8" type="viewpoint" content="width=device-width, initial-scale=1.0">

        <title>
            QUB Houses
        </title>

        <link rel="stylesheet" href="css/normalize.css" type="text/css">
        <link rel="stylesheet" href="css/skeleton.css" type="text/css">
        <link rel="stylesheet" href="css/ui.css" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>

    <body>

        <div class="container">
            <header class="pagehead">
                <div class="row">
                    <h3 class="u-pull-right">Houses for Rent</h3>
                </div>
            </header>

            <main class="maincontent">
                <div class="row">

                   <?php
                        echo "<h4>$address</h4>";
                   ?>
                </div>

                <div class="row">
                   <div class="eight columns">
                        <img id="propertyimage"src="img/house1.jpg">
                   </div>

                   <div class="four columns">
                        <?php
                            echo "<p><strong>£$price</strong> per month</p>
                                <p>$description</p>
                                <p><strong>City/town: </strong>$town</p>
                                <p><strong>Number of Beds: </strong>$beds</p>
                                <p><strong>Type of Property: </strong>$type</p>"
                        ?>
                   </div>
                </div>

                <div class="row" id="back">
                    <a class="button u-pull-right" href="index.php">BACK</a>
                </div>

            </main>
        </div>
    </body>
</html>