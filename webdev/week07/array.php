<?php
     //php code can be written at the top
?>
 
<!DOCTYPE html>
<html>
<head>
 
  <title>PHP escaping example</title>
 
  <body>
 
      <h1>PHP</h1>
 
      <?php 
   $myArray = array('one', 2, '3');

   echo "<p>$myArray[0]</p>";
   echo "<p>$myArray[1]</p>";
   echo "<p>$myArray[2]</p>";

   $myArray = array('one', 2, '3');
   $myArray[1] = 'two'; // assign a new value
   $myArray[3] = 'four'; // create a new element
   $myArray[] = 5;

   echo "<p>$myArray[0]</p>";
   echo "<p>$myArray[1]</p>";
   echo "<p>$myArray[2]</p>";
   echo "<p>$myArray[3]</p>";
   echo "<p>$myArray[4]</p>";  
  
?>

<?php
  $file_cabinet['first_name'] = "Derek";
  $file_cabinet['last_name'] = "Jones";
  $file_cabinet['email'] = "derek@qub.ac.uk";

  $first = $file_cabinet['first_name'];
  $last = $file_cabinet['last_name'];
  $myemail = $file_cabinet['email'];

  echo "<p>Name: $first  $last </p>";
  echo "<p>Email:  $myemail </p>";
?>
 
  </body>
</html>