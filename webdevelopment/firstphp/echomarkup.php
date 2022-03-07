<?php
    $message = " Welcome to ";
    $pathway = "EEE";
    $module = 7063;
       
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>PHP escaping example</title>
  <style>
     #mycontent{
                 font-weight:bold;
                 margin: 20px;
                 color:grey;
         }

         .mymodules{
                 font-size:14px;
                 padding:10px;
                 background: #eee;
         }
  </style>
  <body>
 
      <h1>My Course</h1>
         
        <?php
                echo "<div class='mymodules'><h3>$message $pathway $module</h3></div>";
                echo "<div id='mycontent'> This module is heavily based on developing your skill's as a 
                software web developer and uses a practice and problem based learning approach rather than 
                delving too much into the underlying web infrastructure theory and technologies. </div>";
        ?>
   
   <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
  </body>
</html>
