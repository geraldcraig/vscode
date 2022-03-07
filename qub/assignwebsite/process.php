<?php

    include('dbconn.php');

    $name = $conn -> real_escape_string($_POST["username"]);

    $lastname = "craig";

    $insertquery = "INSERT INTO user (first_name, last_name) VALUES ('$name', '$lastname')";

    $result = $conn -> query($insertquery);

    if(!$result) {

        echo $conn -> error;

    } else {

        echo "<p>$name has been added to your database.</p>";
    }

?>