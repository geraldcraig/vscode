<?php
    include("dbconn.php");

    $schedule = " SELECT * FROM myitems ";

    $scheduleresults = $conn -> query ($schedule);

    if (!scheduleresults) {
        echo $conn -> error;
        exit();
    }

    //print_r($scheduleresults);
?>

<!DOCTYPE html>
<html>
    <head>
<title>My Running Schedule</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.0/dist/css/uikit.min.css" />
     <!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.0/dist/js/uikit.min.js"></scri
pt>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.0/dist/js/uikit-
icons.min.js"></script>
    </head>
<body>
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar> 
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="">Schedule</a></li> 
                <li class="uk-parent"><a href="">Training</a></li> 
                <li><a href="">Log Out</a></li>
            </ul> 
        </div>
        <div class="uk-navbar-right">
            <img src="imgs/fit.png" >
        </div>
    </nav>

    <div class="uk-section">
        <div class="uk-container">
            <h2>My Schedule</h2>
            <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>

                <?php
                    while ($row = $scheduleresults -> fetch_assoc()) {
                        $itemdata = $row['items'];
                        $whendata = $row['mydate'];
                        echo " <div> 
                            <div class='uk-card uk-card-body uk-card-default'>
                            <h3 class='uk-card-title'>$whendata</h3>
                            $itemdata
                            </div>
                        </div> ";
                    
                    }
                ?>
        </div>
    </div>

</body>
</html>