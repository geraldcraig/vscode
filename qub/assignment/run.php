<?php

    include("dbconn.php");

    $filename = "data/sample5.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // counter for output
    $count = 0;

    // loop to read each line from CSV file into $row array
    while ( ($row = fgetcsv($contents)) !== FALSE ) {
        
        echo "<div>";
        print_r($row);
        echo "</div>";

        // Perform insert queries
        // 1 - student_details table: id (PK), name (UNIQUE)
        $insert_album = "INSERT INTO album (title) VALUES ('$row[0]') ";

        $result = $conn -> query($insert_album);
            
        if (!$result) {         
            echo $conn -> error;       
        } else {

            $count++;
            
            // get the last insert id
            $last_album_id = $conn->insert_id;

            // get the number of elements in $row
            $num_elements = count($row);
            //echo "<p>Array size = $num_elements</p>";

            // iterate over rest of $row array for the classes
            for ($index = 1; $index < $num_elements; $index++) {

                // 2 - student-classes table: id (PK), class_name (UNIQUE)
                // using $row[$index] to insert each of the classes in $row array
                $insert_classes = "INSERT IGNORE INTO genre (genre_type) VALUES ('$row[$index]') ";

                $result = $conn -> query($insert_classes);
        
                if (!$result) {
                    echo $conn -> error;      
                } else {
                    
                    // 3 - student-enrolments table: id (PK), student_id (FK), class_id (FK)
                    // need to get the id for the class from the student_classes table
                    $insert_junction = "INSERT INTO album_genre (album_id, genre_id) 
                                        VALUES ('$last_album_id', (SELECT id FROM genre WHERE genre_type = '$row[$index]')) ";

                    $result = $conn -> query($insert_junction);

                    if (!$result) {       
                        echo $conn -> error;      
                    } 
                }
            }
        }
    }

    echo "<h3>Total of {$count} students inserted into database table</h3>";
?>