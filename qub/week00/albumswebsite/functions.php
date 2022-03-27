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

        $endpointalbum = "http://localhost/qub/week00/albumsapi/api.php?filter=$filterdata";

        //$endpointalbum = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?filter=$filterdata";
 
        $resultalbum = file_get_contents($endpointalbum);
         
        $dataalbum = json_decode($resultalbum, true);


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

        
        foreach ($dataalbum as $row) { 

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