<?php

function displaynav() {

    include("connections/dbconn.php");

    $navquery = "SELECT * FROM mytopartists";

    $result = $conn->query($navquery);

    if (!$result) {
        echo $conn->error;
    }

    while ($row = $result->fetch_assoc()) {

        $typedata = $row['name'];
        echo "<li><a href='category.php?filter=$typedata'>$typedata</a></li>";
    }
}


?>