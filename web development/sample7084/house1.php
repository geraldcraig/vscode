<?php

include("conn.php");

$read = "SELECT * FROM qubhouses WHERE id=1";
$result = $conn->query($read);

while($row = $result->fetch_assoc()) {
        $address = $row["address"];
        $price = $row["pricePerMonth"];
        $description = $row["description"];
        $town = $row["town"];
        $beds = $row["beds"];
        $type = $row["type"];
}

?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" name="viewport" content="width=ddevice-width, initial-scale=1.0">
        <title>
            QUB Houses
        </title>

        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/ui.css">
    </head>

    <body class="container">
        <header class="head">
            <div class="row">
            Houses For Rent
            </div>
        </header>

        <main>

        <table class="u-full-width">
            <thead>
                <tr>
                <th class="househead">
                <div class="row">
                        <?php
                            echo $address;
                        ?>
                        </th>
                </tr>
            </thead>
            
            <tbody>

            <tr>
            <td class="housebody">
            </div>
                <div class="row">
                    <div class="eight columns"><img src="img/house1.jpg" /></div>
                    <div class="four columns">
                    <?php
                            echo "<p>£<b>$price</b> per month</p>";
                            echo "<p>$description</p>";
                            echo "<p><b>City/town: </b> $town</p>";
                            echo "<p><b>Number of Beds: </b> $beds</p>";
                            echo "<p><b>Type of Property: </b> $type</p>";
                    
                    ?>
                    </div>
                </div>
                </td>
                
                </tr>
            </tbody>
            </table>
            <a class="button housebutton" href="index.php">Back</a>
        </main>
    </body>

</html>