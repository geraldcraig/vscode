<?php

    include("dbconn.php");

    $filename = "data/album_list.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // counter for output
    $num_records = 0;

    // loop to read each line from CSV file into $row array
    while ( ($row = fgetcsv($contents)) !== FALSE ) {
        
        echo "<div>";
        print_r($row);
        echo "</div>";

        // Perform insert queries
        // 1 - album_sungenre table: id (PK), album_id, subgenre_id
        $album_subgenre_insert = "INSERT INTO album_subgenre (album_id, subgenre_id) VALUES ((SELECT id FROM album WHERE title = '$row[2]'),
                  (SELECT id FROM subgenre WHERE subgenre = '$row[5]')) ";

        $result = $conn -> query($album_subgenre_insert);
       
            
        if (!$result) {         
           echo $conn -> error;       
       } else {

       $num_records++;
   
      } 
    }

    echo "<h3>Total of {$num_records} records inserted into database table</h3>";
?>