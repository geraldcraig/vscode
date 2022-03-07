<?php
    include("../dbconn.php"); // need to specify relative path to file 
    
    $id_data = $conn->real_escape_string($_GET["editid"]);

    $readmovie = "SELECT * FROM myoscars WHERE id=$id_data";

    $result = $conn->query($readmovie);

    if (!$result) {
        echo $conn -> error;
    }
?>

<html>
<head>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css"> 
<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css"> 
<title>Oscars Lab Challenge</title>
</head>

<body>
    <div class="container">
        <h2>Edit Movie</h2>
        <?php

            if (isset($_POST['nameField'])) {

                include("../includes/functions.php");
                update_movie($_POST['idField'], $_POST['nameField'], $_POST['winField']);

            } else {

                include("../dbconn.php");

                $id_data = $conn->real_escape_string($_GET["editid"]);

                $readmovie = "SELECT * FROM myoscars WHERE id = $id_data";

                $result = $conn->query($readmovie);

                if (!$result) {
                    echo $conn -> error;
                }
            }
            

            // should only return one row data due to the WHERE clause
            while ($row = $result->fetch_assoc()) {
                $name_data = $row['movie'];
            }

            echo "<form method='POST' action='edit.php'> 
            <fieldset>
            <label for='nameField'>Name</label>
            <input type='text' value='$name_data' name='nameField'> 
            <label for='winField'>Winner</label>
            <select name='winField'>
                <option value='0'>No</option>
                <option value='1'>Yes</option>
            </select>
            <input type='hidden' value='$id_data' name='idField'> 
            <input class='button-primary' type='submit' value='update'> 
            </fieldset>
            </form>";
        ?> 
    </div>
</body>
</html>