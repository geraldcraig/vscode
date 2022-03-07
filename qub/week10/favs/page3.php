<?php
  session_start();

  // session variable 'favpet', set in process.php, value is stored in a local variable called $pet.
  $pet = $_SESSION['favpet'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessions Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
  </head>

  <body>
    <section class="section">
      <div class="container">

        <h1 class="title">Page 3</h1>
        <h2>What's your favourite animal?</h2>
        
        <?php
          echo "<p>Its a $pet!</p>";
        ?>
        
        <p>
          <a href='page4.php'> Next Page 4</a>
        </p>

      </div>
    </section>
  </body>
</html>