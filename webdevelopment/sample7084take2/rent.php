<?php
    // database connection file
    include("conn.php");

    // query database
    $read = "SELECT * FROM forrent WHERE id=1";
    $result = $conn->query($read);

    $row = $result->fetch_assoc();

    $id = $row["id"];
    $address = $row["address"];
    $price = $row["price"];
    $type = $row["type"];
    $town = $row["town"];
    $description = $row["description"];
    $beds = $row["beds"];

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8" name="viewpoint" content="device=device-width, initial-scale=1.0">

        <title>
        QUB Houses
        </title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
        <link rel="stylesheet" href="ui.css" type="text/css">

    </head>

    <body>
        <!-- 80% width of page, centre aligned  -->
        <div class="container">

            <!-- page header -->
            <div class="row head">
                <h3 class="u-pull-right" id="pagetitle">Houses for Rent</h3>
            </div>

            <div class="row content">

                <div class="row tablehead">
                    <?php

                        echo "<h4>$address</h4>"

                    ?>
                </div>

                <!-- page content -->
                <div class="row tablecontent">

                    <div class="eight columns">
                        <img class="houseimg" src="img/house1.jpg">
                    </div>

                    <div class="four columns">
                        <!-- pull data from database and format in table layout -->
                        <?php

                            echo "<p><strong>£$price</strong> per month</p>
                                <p>$description</p>
                                <p><strong>City/Town: </strong> $town</p>
                                <p><strong>Number of Beds: </strong>$beds</p>
                                <p><strong>Type of property: </strong>$type</p>"; 
                                
                        ?>
                    </div>
      
                </div>

                <div class="row back">
                    <a class="button u-pull-right" href="index.php">BACK</a>
                </div>
            </div>
        </div>
    </body>

</html>