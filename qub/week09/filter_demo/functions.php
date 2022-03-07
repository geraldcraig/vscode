<?php

    // function to read and display all data from the database table
    function readrankings() {
        
        include("dbconn.php");

        $selectquery = "SELECT * FROM myrankings ";

        $result = $conn -> query($selectquery);

        if(!$result) {
            echo $conn->error;
        }


        echo " <table class='table'> 
                <thead>
                    <tr>
                        <th scope='col'># Ranking</th>
                        <th scope='col'>University Name</th> 
                        <th scope='col'>Country</th>  
                    </tr>
                </thead>
                <tbody>
            ";

        
        while ($row = $result->fetch_assoc()) { 

            $ranking = $row["unirank"];
            $university = $row["uniname"];
            $country = $row["unicountry"];

            echo "<tr>
                    <th scope='row'> {$ranking} </th> 
                        <td>{$university}</td>
                        <td>{$country}</td>
                    </tr>";
        }
        
        echo "</tbody></table>";
  
    }


    // function to read and display data from database table based on filter selected
    function readrankingsfilter(string $filterdata='') {

        include("dbconn.php");

        $filterquery = "SELECT * FROM myrankings WHERE unicountry='$filterdata' ";

        $result = $conn -> query($filterquery);

        if(!$result) {
            echo $conn->error;
        }


        echo " <table class='table'> 
                <thead>
                    <tr>
                        <th scope='col'># Ranking</th>
                        <th scope='col'>University Name</th> 
                        <th scope='col'>Country</th>  
                    </tr>
                </thead>
                <tbody>
            ";

        
        while ($row = $result->fetch_assoc()){ 
            $ranking = $row["unirank"];
            $university = $row["uniname"];
            $country = $row["unicountry"];

            echo "<tr>
                    <th scope='row'> {$ranking} </th> 
                        <td>{$university}</td>
                        <td>{$country}</td>
                    </tr>";
        }
        
        echo "</tbody></table>"; 
    }

?>