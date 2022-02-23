<?php

echo "<p>This is the process page.</p>";

$pet_name = $_POST["mypetname"];

$pet_type = $_POST["pettype"];

echo "<p>My {$pet_type} is called {$pet_name}.</p>";

?>