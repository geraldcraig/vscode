<?php

session_start();
        //get the users data
        //store in a local PHP variable
        $my_name = $_POST['sendname'];
                echo $my_name;

    $_SESSION['username'] = $my_name;
 
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sessions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
  </head>
  <body>
<section class="section">
<div class="container">
<h2 class="title">Hi <?php echo $my_name; ?> </h2>
 
<?php
 
        //these print local PHP variables which will not be available if you visit page2.php
        echo "<p>Your name is $my_name as your favourite colour is green.</p>";
 
?>
       
<p>
<br>
<a href='page2.php'> next page (page 2) </a>
</p>
</div>
</section>
</body>
</html>
