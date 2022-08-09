<?php
// Start the session
session_start();

$endpoint = "http://localhost/qub/week00/albumtest/api.php?userid";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);

?>

<!DOCTYPE html>
<html>
<body>

<?php

$user = "sailor";

foreach ($data as $row) {

    $uname = $row['username'];
    if ($uname == $user) {
        $_SESSION["user"] = "$uname";
    } 

}


// Set session variables
$_SESSION["favcolor"] = "john";
$_SESSION["favanimal"] = "pwd";
echo "Session variables are set.";

?>

</body>
</html>