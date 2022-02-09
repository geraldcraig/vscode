<?php
  if (isset($_COOKIE['myfabfourfav'])) {
      $myfavmem = $_COOKIE['myfabfourfav'];
      $clear_button = "<a class='button button-outline' href='clearcookie.php'>Clear</a>";
  } else {
      $myfavmem = "no one!";
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
                        <h3>My favourite is <?php echo " $myfavmem"; ?></h3>
                    </div>
                    
                    <div class="column">
                        <div class="float-right">
                            <a class="button button-primary ml-2" href="index.php">Home</a>
                            <?php
                                if (isset($clear_button)) {
                                    echo $clear_button;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

</body>
</html>
