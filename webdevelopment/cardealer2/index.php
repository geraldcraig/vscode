<?php

$cars=[];

$external = fopen("carsinstock.csv", "r");

while (($data = fgetcsv($external, 0, ",")) !== FALSE) {

    $cars[] = $data;
}

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8" name="viewpoint" content="width=device-width, initial-scale=1.0";>

        <title>
            Car Dealer
        </title>

        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" 
        integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" 
        crossorigin="anonymous">

    </head>

    <body>
        <table class="pure-table">
            <thead>
                <tr>
                    
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $max = count($cars);
                    $i = 1;

                   
                    while($i < $max) {

                        $manufac = $cars[$i][0];
                        $model = $cars[$i][1];
                        $country = $cars[$i][2];
                        $price = $cars[$i][3];
                        $year = $cars[$i][4];


                        echo "<tr>";
                        echo "<td>$manufac</td>";
                        echo "<td>$model</td>";
                        echo "<td>$price</td>";
                        echo "</tr>";

                        $i++;
                    }
                ?>
            </tbody>
        </table>


    </body>

</html> 