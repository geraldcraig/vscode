<?php
 
      $shoppingList= array("wine","fish","bread","grapes","cheese");
 
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>Loops & Arrays</title>
 
  <body>
    <div class='container'>
      <h1>My Shopping</h1>
               
        <?php
       
            $max = count($shoppingList);
            $i = 0;
 
            while($i < $max) {
                $item = $shoppingList[$i];
                echo "<p>$item</p>";
                $i++;
            }
        ?>
 
        </div>
               
  </body>
</html>