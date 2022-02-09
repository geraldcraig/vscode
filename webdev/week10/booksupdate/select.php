<?php
    include("dbconn.php");
   
    $selectquery = "SELECT * FROM mybooksupdate";
    $result = $conn -> query($selectquery);
 
    if (!$result) {
 
        echo $conn->error;    
 
    }
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
                            <h1>Select a book to edit</h1>
                    </div>
            </div>
 
            <div class="grid-x">
                <?php
                    while ($row = $result->fetch_assoc() ) {
                        $title_data = $row['title'];
                        $bookid = $row['id'];
                           
                        echo "<div class='small-6 cell'>
                                <div class='grid-x'>
                                    <div class='small-6 cell'>
                                        $title_data
                                    </div>
                                    <div class='small-6 cell'>
                                        <a href='edit.php?editrow=$bookid' class='success button'>edit</a>
                                    </div>
                                </div>
                           </div>";                                            
                    }
                ?>
        </div>
    </div>
               
</body>
</html>