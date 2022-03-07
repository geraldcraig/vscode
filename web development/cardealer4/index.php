<?php

$cars = [];

$external = fopen("carsinstock.csv", "r
");
while (($data = fgetcsv($external, 0, ",")) !== FALSE) {

    $cars[] = $data;

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <link rel="stylesheet" href="ui.css" type="text/css">

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" 
    integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" 
    crossorigin="anonymous">

</head>

<body>

    <div class="container main">
        <header class="pagetitle">
        </header>

        <div class="content">
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $max = count($cars);
                    $i = 1;

                    while($i < $max) {

                        $manufac = $cars[$i][0];
                        $model = $cars[$i][1];
                        $year = $cars[$i][4];

                        echo "<tr>
                                <td>$manufac</td>
                                <td>$model</td>
                                <td>$year</td>
                            </tr>";

                            $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>