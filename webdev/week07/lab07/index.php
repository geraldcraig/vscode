<?php
      //declare variables with values
      $startyear = 2000;
      $name = "Peter Parker";
      $uniname = 'Central Washington'.' University';
      $finishyear = 2003;

      //calculate years enrolled
      $yearsenrolled = $finishyear - $startyear;
?>

<!DOCTYPE html> 
  <html lang="en"> 
    <head> 
     <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <title>PHP Variables</title> 
     <link rel="stylesheet"   
href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css"> 
    <link rel="stylesheet" href="ui.css">
  </head> 
  <body> 
    <div class="container">

      <h2> Class of <?php echo $finishyear; ?> </h2>
      <?php

          echo "<div id='variable'> {$name} started {$uniname} in the year {$startyear} and 
          finished in {$finishyear}. </div>";

          echo "<div id='year'>Spending {$yearsenrolled} year(s) at {$uniname}.</div>";

      ?>
    </div>
  </body> 
</html> 