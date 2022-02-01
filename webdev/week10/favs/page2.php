<?php
      session_start();

      // find and set a local variable called $myfav, its value is using the temporary session data (set in process.php).
      $myfav = $_SESSION['favcolour'];

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
        
        <h1 class="title">Page 2</h1>
        <h2>What's your favourite colour?</h2>
        
        <?php
            // display the local $myfav variable data on the webpage
            echo "<p>Your favourite colour is $myfav.</p>";
        ?>
        
        <p>
          <a href='page3.php'> Next Page 3</a>
        </p>
        
      </div>
    </section>
  </body>
</html>