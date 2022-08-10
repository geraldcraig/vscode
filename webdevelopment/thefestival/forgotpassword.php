<?php

include("conn.php");

if(!isset($email)) {
  $email ="";
}

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    
    <!-- framework links and scripts -->
    <?php
      include("modules/framework.html")
    ?>

    <!-- jQuery scrips and animations -->
    <script src="scripts/script.js"></script>
    <script src='scripts/accordian.js'></script>
    <script src="scripts/login.js"></script>

    <!-- navbar animation specific to each page -->
    <script>
      // navbar highlighted animation (this needs implemented on each page)
      $(function() {
        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").hover(function() {
          $("#contactus a").attr("class", "nav-link active");
        });

        $("#contactus a").attr("class", "nav-link");
        $("#contactus a").mouseout(function() {
          $("#contactus a").attr("class", "nav-link");
        });
      });
    </script>
    
  </head>

  <body>
  
    <!-- include navbar -->
    <?php
      include("modules/navbar.php");
    ?>

    <div class="admin container">
    <h1 class="biotitle text-center">Forgot Password</h1>
      <form class ="artistapply" method="POST" action="forgotpasswordprocess.php">
        
        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            if(isset($isinvalidemail)) {echo "$isinvalidemail ";} if(isset($incorrectemail)) {echo "$isinvalidpw ";}?> overflow-auto" 
            id="emaillogin" name="emaillogin" placeholder="<?php if(isset($isinvalidall) || isset($isinvalidemail) || 
            isset($incorrectemail)) {echo "$emailph ";} else {echo "artist@band.com";}?>" value="<?php echo htmlspecialchars($email)?>">
            
            <?php
              if (isset($noemail)) {
                echo "<small class='form-text text-danger text-left'>
                $noemail
                </small>";
              }
            ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <input type="submit" class="btn btn-outline-success input-group-btn" id="forgotpasswordbutton" name="forogtsubmit" value="Reset Password">
          </div>
        </div>
      </form>
    </div>

    <!-- footer -->
    <?php
      include("modules/footer.html");
    ?>

  </body>
</html>