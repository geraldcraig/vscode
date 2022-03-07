<?php
    if (isset($_POST['myfavourite'])) {
        $cookie_name = "myfabfourfav";
        $cookie_value = $_POST['myfavourite'];
        setcookie($cookie_name, $cookie_value, time() + 60, "/", null, false);
        $result = "Cookie saved";
    } else {
        $result = "No cookie saved";
    }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cookies Demo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
  <link rel="stylesheet" href="myui.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 mytitle"></div>
        </div>
        
        <div class="row">
            <div class="column column-60 myform">
                <div class="row">
                    <div class="column">
                        <h3><?php echo " $result"; ?></h3>
                    </div>
                        
                    <div class="column">
                        <div class="float-right">
                            <a class="button button-primary ml-2" href="savedfav.php">My Fav Fab 4</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

</body>
</html>
