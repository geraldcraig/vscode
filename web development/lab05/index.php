<!DOCTYPE html>

<!-- PHP serverside code-->
<?php

$myserver = 'My PHP';

?>

<!-- HTML markup language -->
<html>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <metaname="viewport" content="width=device-width, initial-scale=1">

    <head>
        <title>
        Variables
        </title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    </head>

    <body>

        <section class="section">
            <div class="container">
                <?php

                    echo "<h2>$myserver</h2>";

                ?>
            </div>
        </section>
    </body>

</html>
