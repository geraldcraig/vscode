<?php

function displaynav() {

    include("connections/dbconn.php");

    $navquery = "SELECT * FROM album";

    $result = $conn->query($navquery);

    if (!$result) {
        echo $conn->error;
    }

    while ($row = $result->fetch_assoc()) {

        $typedata = $row['number'];
        echo "<li><a href='top500.php?filter=$typedata'>$typedata</a></li>";
    }
}

?>