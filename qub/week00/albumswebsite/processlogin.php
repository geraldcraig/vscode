<?php

$uname = $_POST["sailor"];
$upass = $_POST["pwd"];

$checkuser = "SELECT * FROM user WHERE username ='$uname' ";

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