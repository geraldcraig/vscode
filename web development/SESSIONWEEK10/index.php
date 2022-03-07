<?php

session_start();

if(isset($_SESSION['username'])) {
    $access=1;
    $my_name = $_SESSION['username'];
} else {
    $access=0;
}

echo $access;
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

<?php



if($access==0) {

    echo "<h1 class='title'>
        Guest
    </h1>";
    
    echo "<form action='process.php' method='POST'>
            <p class='subtitle'>
            <h2> what is your name</h2>
            </p>
            <div class='field'>
            <div class='control'>
                <input name='sendname' class='input is-primary' type='text' placeholder='name'>
            </div>
            </div>
            
                
            <input type='submit' class='button is-primary' value='submit'/>     
        </form>";
} else {
    echo "<h1 class='title'>
        $my_name
    </h1>";

}
?>
 

         
</div>
</section>
</body>
</html>
 
