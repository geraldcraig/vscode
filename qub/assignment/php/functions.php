<?php

function displaynav() {

    include("connections/dbconn.php");

    $navquery = "SELECT * FROM artist";

    $result = $conn->query($navquery);

    if (!$result) {
        echo $conn->error;
    }

    while ($row = $result->fetch_assoc()) {

        $typedata = $row['name'];
        echo "<li><a href='top500.php?album_id=$typedata'>$typedata</a></li>";
    }
}

?>