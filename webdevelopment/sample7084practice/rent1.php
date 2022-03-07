<?php

include("conn.php");

$read = "SELECT * FROM qubhouses WHERE id = 1";
$result = $conn->query($read);

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>
            Houses
        </title>

        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/ui.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container">
            <div class="row" id="head">
                <h3 class="u-pull-right" id="pagetitle">House For Rent</h3>
            </div>

            <div class="container-main">
                <div class="row" id="tabletitle">
                    <?php

                        $address = $row["address"];

                        echo "<h4>$address</h4>";
                    ?>
                </div> 

                <div class="row">
                    <div class="eight columns">
                        <img class="rentImage" src="img/house1.jpg">
                    </div>
                    <div class="four columns">

                        <?php

                            $price = $row["pricePerMonth"];
                            $description = $row["description"];
                            $town = $row["town"];
                            $beds = $row["beds"];
                            $type = $row["type"];

                            echo "<p><strong>£$price</strong> per month</p>
                                <p>$description</p>
                                <p><strong>City/Town: </strong>$town</p>
                                <p><strong>Number Of Beds: </strong>$beds</p>
                                <p><strong>Type Of Property: </strong>$type</p>"
                        ?>
                    </div>
                </div>

                <div class="row">
                    <a class="button u-pull-right" id="backbutton" href="index.php">BACK</a>
                </div>
            </div>

            </div>
        </div>
    </body>

</html>