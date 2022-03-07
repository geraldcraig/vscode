<?php

$cars = [];

$external = fopen('carsinstock.csv', 'r');

while(($data = fgetcsv($external, 0, ',')) !== FALSE) {
    $cars[] = $data;
}


?>

<!DOCTYPE html>

<html>
    <head>

        <meta name="viewpoint" content="width=device-width, initial-scale=1">

        <title>
        Car Dealer
        </title>

        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" 
        integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    </head>

    <body>

    <table class="pure-table">
        <thead>
            
            <?php

                $a = 0;

                while($a < 1) {

                    $headman = $cars[$a][0];
                    $headmodel = $cars[$a][1];
                    $headcountry = $cars[$a][2];
                    $headprice = $cars[$a][3];
                    $headyear = $cars[$a][4];

                echo "<tr>";
                    echo "<th>$headman</th>";
                    echo "<th>$headmodel</th>";
                    echo "<th>$headcountry</th>";
                    echo "<th>$headprice</th>";
                    echo "<th>$headyear</th>";
                echo "</tr>";

                $a++;
                }
                ?>


        </thead>

        <tbody>
            <?php

            $max = count($cars);
            $i = 1;


            
            while($i < $max) {
                $manuf = $cars[$i][0];
                $model = $cars[$i][1];
                $country = $cars[$i][2];
                $price = $cars[$i][3];
                $year = $cars[$i][4];

                echo "<tr>";
                    echo "<td> $manuf </td>";
                    echo "<td> $model </td>";
                    echo "<td> $country </td>";
                    echo "<td> $price </td>";
                    echo "<td> $year </td>";
                echo "</tr>";
                
                $i++;
                
            }


            ?>
        </tbody>
    </table>

    
    </body>
</html>