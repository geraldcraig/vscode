<?php
 
    //get date and time
    $getdate = date("Y-m-d H:i:s");
   
    //get UNIX timestamp (used for Database timestamps)
    $gettime = time();
   
    //convert it back to human readable
    $humantime = date("H:i:s", $gettime);
   
    echo "<p>Date and Time $getdate </p>";
   
    echo "<p>The current time is $humantime. </p>";
 
?>