<?php
    include("dbconn.php");
   
    $newfname = $conn->real_escape_string($_POST["firstname"]);
    $newusername = $conn->real_escape_string($_POST["username"]);
    $userid = $conn->real_escape_string($_POST["id"]);
    
   
    $update = "UPDATE user SET username = '$newusername', firstname = '$newfname' WHERE id = '$userid' ";
 
    echo $update;
?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Updating MySQL Row Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js" ></script>
  </head>
 
<body>
 
    <div class="grid-container">
        <div class="grid-x">
            <div class="small-6 cell">
                <h1>Book Updated</h1>
            </div>
        </div> 
        
    <?php
        $updateresult = $conn -> query($update);

        if (!$updateresult) {

            echo $conn -> error;

        } else {

            echo "<p>Success</p><p>Go see the <a href='account.php'>edit</a></p>";
        }

    ?>
    </div>  
 
</body>
</html>