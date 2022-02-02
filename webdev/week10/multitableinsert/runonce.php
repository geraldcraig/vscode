<?php

    include("dbconn.php");

    $filename = "data/userdata.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // loop to read each line from CSV file into $row array
    $count = 0;
    while ( ($row = fgetcsv($contents)) !== FALSE ) {

        //print_r($row);

        // get the contents of the line
        $name = $row[0];
        $password = $row[1];
        $typeid = $row[2];
        $type = $row[3];
        
        // create first INSERT INTO query (IGNORE to silently ignore duplicate entries) for child table
        // child table has type_id column that is Primary Key
        // parent table uses its type_id field as a foreign key into child table primary key
        $insertquery = "INSERT IGNORE INTO myuserstypes (type_id, role) VALUES ('$typeid', '$type')";
            
        // execute the query
        $result = $conn -> query($insertquery);
                    
        // check the result
        if(!$result) {         
            echo $conn -> error;      
        } else {

            // create second INSERT INTO query for parent table
            $insertquery2 = "INSERT INTO myusers (name, password, type_id) VALUES ('$name', '$password', '$typeid')";
               
            // execute the query
            $result = $conn -> query($insertquery2);
                    
            // check the result
            if(!$result) {        
                echo $conn -> error;    
            }
            $count++;

        }
    }

    echo "<h3>Total of {$count} rows successfully inserted into database table.</h3>"
?>