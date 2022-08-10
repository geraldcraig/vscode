<?php

    include("dbconn.php");  
    
    $readquery = "SELECT * from movie_users";
    
    $result = $conn->query($readquery);
     
    if (!$result) {
        echo $conn->error;    
    } 

?>

 
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Movie Reviews Demo</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
 
<body>
    <div class="container">
    
            <div class="row">
                    <div class="column"><h1>Select Reviewer</h1></div>
            </div>

            <div class="row">

                <form action="showuserreviews.php" method="POST" name="selection">
                <fieldset>
                    <label for="reviewer">Reviewer</label>
                    <select id="reviewer" name="reviewChoice">
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['username'];
                            echo "<option value=$name>{$name}</option>";
                        }
                    ?>
                    </select>
                    <input class="button-primary" type="submit" name= "submitChoice" value="Select">
                </fieldset>
                </form>

            </div>
    </div>
 
</body>
</html>