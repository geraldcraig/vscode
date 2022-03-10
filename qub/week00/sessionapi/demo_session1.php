<?php
// Start the session
session_start();

$userid = 4;

$endpoint = "http://localhost/qub/week00/sessionapi/api.php?userid=$userid";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);

?>

<!DOCTYPE html>
<html>
<body>

<?php

foreach ($data as $row) {

    $uname = $row['username'];
    $pwd = $row['userpassword'];

}
// Set session variables
$_SESSION["favcolor"] = "$uname";
$_SESSION["favanimal"] = "$pwd";
echo "Session variables are set.";
?>

</body>
</html>