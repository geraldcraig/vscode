<?php

session_start();

$uname = $_POST['username'];
$upass = $_POST['password'];

$_SESSION['username'] = $uname;
$_SESSION['password'] = $upass;

$checkuser = "SELECT * FROM user WHERE username =$uname ";

$endpoint = "http://localhost/qub/week00/albumsapi/api.php?userid=$checkuser";

$resource = file_get_contents($endpoint);

$data = json_decode($resource, true);


$result = $conn->query($checkuser);

if (!$result) {
    echo $conn->error;
}

$num = $result->num_rows;

if ($num > 0) {
    echo "no match";
} else {
    echo "successful";
}
?>