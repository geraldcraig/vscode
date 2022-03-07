<?php

    include("conn.php");

    $read = "SELECT * FROM housetable WHERE id=1";
    $result = $conn->query($read);

    $row = $result->fetch_assoc();

    $address = $row["address"];
    $type = $row["type"];
    $town = $row["town"];
    $description = $row["description"];
    $beds = $row["beds"];
    $price = $row["price"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>QUB Houses</title>

    <link rel="stylesheet" href="ui.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>

    <div class="container">
        <header class="row head">
            <h1 class="u-pull-right">Houses for Rent</h1>
        </header>

        <div class="content">
            <div class="row tablehead">
                    <?php

                        echo "<h2>$address</h2>";

                    ?>
            </div>

            <div class="row">

                <div class="eight columns">
                    <img id="propertyimg" src="img/house1.jpg">
                </div>

                <div class="four columns">
                    <?php

                        echo "<p><strong>£$price</strong> per month</p>
                        <p>$description</p>
                        <p><strong>City/town: </strong>$town</p>
                        <p><strong>Number of Beds: </strong>$beds</p>
                        <p><strong>Type of property</strong>$type</p>";

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