<?php
 
$endpoint = "http://localhost/qub/week00/apitest/api.php?user";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);
 
?>

<!DOCTYPE html>
<html>
<body>
 
<?php
$uid = $_POST['userid'];
$pw = $_POST['password'];
 
if($uid == 'ben' and $pw == 'ben23')
{    
    session_start();
    $_SESSION['sid']=session_id();
    echo "Logged in successfully";
}
?>
 
</body>
</html>