<?php

    // function to read and display all data from the database table
    function readrankings() {
        
        $endpoint = "http://localhost/qub/week00/albumsapi/api.php";

        //$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php";
 
        $result = file_get_contents($endpoint);
         
        $data = json_decode($result, true);


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

        
        foreach ($data as $row) { 

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

        //$endpointalbum = "http://localhost/qub/week00/albumsapi/api.php?filter=$filterdata";

        //$endpointalbum = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?filter=$filterdata";
 
        //$resultalbum = file_get_contents($endpointalbum);
         
        //$dataalbum = json_decode($resultalbum, true);

        $filterquery = "SELECT album.id, album.number, album.title, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id WHERE name='$filterdata' ";

        $result = $conn -> query($filterquery);

        if (!result) {
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
