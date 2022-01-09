<?php
       
      $message = "Welcome to ";
      $pathway = "CSC";
      $module = 7084;
       
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>PHP Variable Scope</title>
 
  <body>
 
      <h1>My Course</h1>
         
        <?php
                $pathway = "COM";
                echo "<h3>$message $pathway $module</h3>";
        ?>
   
  </body>
</html>