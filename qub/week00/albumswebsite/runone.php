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
        // 1 - artist table: id (PK), name (UNIQUE)
        $insert_artists = "INSERT IGNORE INTO artist (name) VALUES ('$row[3]') ";

        $result = $conn -> query($insert_artists);
       
            
        if (!$result) {         
           echo $conn -> error;       
       } else {

       $num_records++;

       
        //2 - year table: id (PK), year (UNIQUE)
        $insert_year = "INSERT IGNORE INTO year (year) VALUES ('$row[1]') ";

        $result = $conn -> query($insert_year);

        if (!$result) {
            echo $conn -> error;      
        } else {
        
        //3 - genre table: id (PK), genre (UNIQUE)
        $insert_genre = "INSERT IGNORE INTO genre (genre) VALUES ('$row[4]') ";

        $result = $conn -> query($insert_genre);

        if (!$result) {
            echo $conn -> error;      
        } else {

        //4- subgenre table: id (PK), subgenre (UNIQUE)
         $insert_subgenre = "INSERT IGNORE INTO subgenre (subgenre) VALUES ('$row[5]') ";

         $result = $conn -> query($insert_subgenre);
 
         if (!$result) {
             echo $conn -> error;      
         } else {
       
            }
          } 
        }
      }
    }

    echo "<h3>Total of {$num_records} records inserted into database table</h3>";
?>