<?php

include("dbconn.php");

$schedule = "SELECT * FROM items";
$result = $conn->query($schedule);

if(!$result) {
    echo $conn->error;
    exit();
}

?>

<!DOCTYPE html>

<html>

    <head>
        <title>My Running Schedule</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--UIkitCSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/css/uikit.min.css" />
        <!--UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/js/uikit.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/js/uikit-icons.min.js">
        </script>
    </head>

    <body>
        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="">Schedule</a>
                    </li>
                    <li class="uk-parent">
                        <a href="">Training</a>
                    </li>
                    <li>
                        <a href="">Log Out</a>
                    </li>
                </ul>
            </div>
            <div class="uk-navbar-right">
            <img src="images/fit.png" >
            </div>  
        </nav>

        <div class="uk-section">
            <div class="uk-container">
                <h2>My Schedule</h2>
                    <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
                        <?php

                            while($row = $result->fetch_assoc()) {

                                $listitem = $row["listitem"];
                                $whend = $row["whend"];

                                $myDateTime = DateTime::createFromFormat('Y-m-d', $whend);
                                $newDateString = $myDateTime->format('l dS M Y');


                                echo "<div>
                                        <div class='uk-card uk-card-body uk-card-default'>
                                            <h3 class='uk-card-title'> $newDateString </h3>
                                            $listitem
                                        </div>
                                    </div>";
                                
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>