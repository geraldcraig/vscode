<?php

session_start();

if(isset($_POST['logout'])) {
  unset($_SESSION['session']);
  session_destroy();

  header("Location: ../index.php");
  
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
  <a class="navbar-brand" href="index.php"><img src="img/navbarlogo.png" id="navbarlogo"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
  aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item" id="home">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item" id="artists">
        <a class="nav-link" href="artist.php">Artists</a>
      </li>
      <li class="nav-item" id="lineup">
        <a class="nav-link" href="lineup.php">Line-Up</a>
      </li>
      <li class="nav-item" id="contactus">
        <a class="nav-link text-decoration-none" href="#cu1">Contact Us</a>
      </li>
    </ul>

    <?php

        if(!isset($_SESSION['session'])) {
          echo "<a class='btn btn-outline-success my-2 my-sm-0 mr-2' href='signup.php'>Sign Up</a>
          <a class='btn btn-outline my-2 my-sm-0' href='login.php'><i class='icon-user-circle'></i>Login</a>";
        } else {

          $privileges = $_SESSION['privileges'];
          $display = $_SESSION['username'];
          $sessiondetails = $_SESSION['session'];

          echo "<form action='modules/navbar.php' method='POST'>
          <a class='btn btn-outline-info my-2 my-sm-0 mr-2' href='edit/admin.php'><i class='icon-user-circle'></i>$display</a>
          <input type='submit' class='btn btn-outline-danger my-2 my-sm-0' value='Logout' name='logout'>
          </form>";

        }

    ?>

      
      
  </div>
</nav>