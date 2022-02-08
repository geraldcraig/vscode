<?php
  if (isset($_COOKIE['myfabfourfav'])) {
    $cookie_name = "myfabfourfav";
    $cookie_value = "";
    setcookie($cookie_name, $cookie_value, time() - 60, "/", null, false);
  } 

  header("Location: index.php");
?>