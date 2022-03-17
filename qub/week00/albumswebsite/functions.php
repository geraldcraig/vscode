<?php

    // function to read and display all data from the database table
    function readrankings() {
        
        $endpoint = "http://localhost/qub/week00/albumsapi/api.php";
 
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

        $endpoint = "http://localhost/qub/week00/albumsapi/api.php?filter=$filterdata";
 
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

?>