<?php

function displaynav() {

    include("connections/dbconn.php");

    $navquery = "SELECT album.number, album.title, artist.name, album.year, album.id
    FROM album
    INNER JOIN artist
    ON album.artist_id = artist.id
    ORDER BY album.number";

    $result = $conn->query($navquery);

    if (!$result) {
        echo $conn->error;
    }

    while ($row = $result->fetch_assoc()) {

        $typedata = $row['number'];
        echo "<li><a href='category.php?filter=$typedata'>$typedata</a></li>";
    }
}


?>