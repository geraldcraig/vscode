<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
  <title>PHP escaping example</title>
 
  <body>
 
      <h1>My PHP</h1>
      
      <?php 

      const HH = '<h3>';
      const HHC = '</h3>';

      $MESSAGE = "this is a string being printed out by php";

      echo HH.$MESSAGE.HHC;
      ?>
 
 
  </body>
</html>
 
