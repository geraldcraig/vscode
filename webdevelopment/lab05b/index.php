<?php

$startyear = 1999;
$name = 'Peter Parker';
$uniname = 'Central Washington University';
// $finishyear = '';


?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <title>
        Variables Lab05b
        </title>

        <link rel="stylesheet" href="ui.css" type="text/css" >
    </head>

    <body>

        <?php

            $finishyear = 2000;
            $yearsenrolled = $finishyear - $startyear;
            echo "<div id='variable'>$name started $uniname in the year $startyear and finished in $finishyear, Spending $yearsenrolled
            at the university.</div>";
        ?>

    </body>
</html>