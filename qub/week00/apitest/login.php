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

foreach ($data as $row) {

    $name = $row['firstname'];
    $pass = $row['userpassword'];

    if($uid == $name and $pw == $pass)
    {    
        session_start();
        $_SESSION['sid']=session_id();
        echo "Logged in successfully";
        header("Location: index.php");
    } else {
	    header("Location: form.php");
    }

}
 
?>
 
</body>
</html>