<?php

include("conn.php");

if(!isset($username)) {
  $username ="";
}

if(!isset($email)) {
  $email ="";
}

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up | B Festival</title>
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
    <script src="scripts/accordian.js"></script>
    <script src="scripts/signup.js"></script>

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
    <h1 class="biotitle text-center">sign up</h1>
      <form class ="artistapply" method="POST" action="signupprocess.php" enctype='multipart/form-data'>
        
        <div class="form-row">
          <div class="form-group col">
            <label for="inputEmail4">Username</label>
            <input type="text" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            if(isset($isinvalid3)) {echo "$isinvalid3 ";} if(isset($isinvalid4)) {echo "$isinvalid4 ";}
            if(isset($isinvalid5)) {echo "$isinvalid5 ";}?> overflow-auto" 
            id="namesignup" name="usernamesignup" value="<?php echo htmlspecialchars($username)?>"
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid3) || isset($isinvalid4) || isset($isinvalid5)) 
            {echo "$usernameph ";} else { echo "username";} ?>">

            <?php

            if(isset($usernametaken)) {
              echo "<small class='form-text text-danger text-left'>
              $usernametaken
              </small>";
            } 

            ?>

          </div>
        </div>
      

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            if(isset($isinvalid1)) {echo "$isinvalid1 ";} if(isset($isinvalid3)) {echo "$isinvalid3 ";} 
            if(isset($isinvalid4)) {echo "$isinvalid4 ";}  if(isset($isinvalid6)) {echo "$isinvalid6 ";} ?> overflow-auto" 
            id="emailsignup" name="emailsignup" value="<?php echo htmlspecialchars($email)?>"
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid3) || isset($isinvalid4) || 
            isset($isinvalid6)) {echo "$emailph";} else { echo "user@bfestival.com";}?>">

            <?php

              if(isset($emailtaken)) {
                echo "<small class='form-text text-danger text-left'>
                $emailtaken
                </small>";
              } 

              if (isset($emailErr)) {
                echo "<small class='form-text text-danger text-left'>
                  $emailErr
                </small>";
              }
            ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";}
            if(isset($isinvalid1)) {echo "$isinvalid1 ";} if(isset($isinvalid2)) {echo "$isinvalid2 ";} 
            if(isset($isinvalid3)) {echo "$isinvalid3 ";} if(isset($isinvalid7)) {echo "$isinvalid7 ";} ?> 
            overflow-aut" id="passwordsignup" name="passwordsignup" 
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid3) 
            || isset($isinvalid7)) {echo "$pwph ";} else { echo "Password";}?>">
            <?php

              if(isset($password_confirm_error)) {
                echo "<small class='form-text text-danger text-left'>
                $password_confirm_error
                </small>"; 
              }

              if(isset($password_length_error)) {
                echo "<small class='form-text text-danger text-left'>
                $password_length_error
                </small>"; 
              }
            ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Verify Password</label>
            <input type="password" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";}
            if(isset($isinvalid1)) {echo "$isinvalid1 ";} if(isset($isinvalid2)) {echo "$isinvalid2 ";} 
            if(isset($isinvalid8)) {echo "$isinvalid8 ";} ?> 
            overflow-aut" id="passwordverifysignup" name="passwordverifysignup" 
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid8) ) 
            {echo "$pwvph ";} else { echo "Verify Password";}?>">
            <?php

              if(isset($password_confirm_error)) {
                echo "<small class='form-text text-danger text-left'>
                $password_confirm_error
                </small>"; 
              }

              if(isset($password_length_error)) {
                echo "<small class='form-text text-danger text-left'>
                $password_length_error
                </small>"; 
              }
            ?>
          </div>
        </div>

        <div class="input-group">
          <input type="submit" class="btn btn-outline-success input-group-btn" name='signupsubmit' value="Sign Up">
        </div>

      </form>
    </div>
    
    <!-- footer -->
    <?php
        include("modules/footer.html");
      ?>

  </body>
</html>