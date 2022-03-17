<?php

    // function to read and display all data from the database table
    function readrankings() {
        
        include("dbconn.php");

        $selectquery = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id";

        $result = $conn -> query($selectquery);

        if(!$result) {
            echo $conn->error;
        }


        echo " <table class='table'> 
                <thead>
                    <tr>
                        <th scope='col'># Number</th>
                        <th scope='col'>Artist</th>
                        <th scope='col'>Album</th>
                        <th scope='col'>Year</th>  
                    </tr>
                </thead>
                <tbody>
            ";

        
        while ($row = $result->fetch_assoc()) { 

            $number = $row["number"];
            $artist = $row['name'];
            $album = $row["title"];
            $year = $row["year"];

            echo "<tr>
                    <th scope='row'> {$number} </th> 
                        <td>{$artist}</td>
                        <td>{$album}</td>
                        <td>{$year}</td>
                    </tr>";
        }
        
        echo "</tbody></table>";
  
    }


    // function to read and display data from database table based on filter selected
    function readrankingsfilter(string $filterdata='') {

        include("dbconn.php");

        $filterquery = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id WHERE name='$filterdata' ";

        $result = $conn -> query($filterquery);

        if(!$result) {
            echo $conn->error;
        }


        echo " <table class='table'> 
                <thead>
                    <tr>
                        <th scope='col'># Number</th>
                        <th scope='col'>Artist</th>
                        <th scope='col'>Album</th>
                        <th scope='col'>Year</th>  
                    </tr>
                </thead>
                <tbody>
            ";

        
        while ($row = $result->fetch_assoc()) { 

            $number = $row["number"];
            $artist = $row['name'];
            $album = $row["title"];
            $year = $row["year"];

            echo "<tr>
                    <th scope='row'> {$number} </th> 
                        <td>{$artist}</td>
                        <td>{$album}</td>
                        <td>{$year}</td>
                    </tr>";
        }
        
        echo "</tbody></table>";
    }

?>