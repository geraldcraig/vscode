<?php
        $fullmodule = "This module is heavily based on developing your skill's as a software web developer and uses a practice and problem based learning approach rather than delving too much into the underlying web infrastructure theory and technologies.";
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>PHP Include Example</title>
  <style>
     #mycontent{
                 font-weight:bold;
                 margin: 20px auto;
                 width: 70%;
         }
      .mymodules{
                 font-size:14px;
                 padding:10px;
                                 margin: 5px;
                 background: #eee;
       }
  </style>
  <body>
   <div id='mycontent'>
      <h1>My Course</h1>

       <?php
            include("outside.php");
       ?>
       
         <h3>$message</h3>
                 
        <?php
               
            echo "<div class='mymodules'>$fullmodule</div>";
 
        ?>
   </div>
 
  </body>
</html>