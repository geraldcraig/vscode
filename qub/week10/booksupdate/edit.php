<?php
    include("dbconn.php");
   
    $row = $_GET['editrow'];
   
    $read = "SELECT * FROM mybooksupdate WHERE id='$row' ";
    $result = $conn -> query($read);
 
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
                <h1>Edit Book</h1>
            </div>
        </div>
       
        <?php
            while ($row = $result->fetch_assoc() ) {
                       
            $title_data = $row['title'];

            $bookid = openssl_encrypt($row['id'], "AES-128-ECB", "bookid");
                       
            echo "<form action='processedit.php' method='POST'>
                   <div class='grid-x'>
                       <div class='small-8 cell'>  

                           <input value='$title_data' type='text' name='senttitle'>

                           <input value='$bookid' type='hidden' name='sentid'>

                       </div>
                       <div class='cell'>
                           <input type='submit' class='success button'>
                       </div>
                   </div>
               </form>";                                              
            }
        ?>
                               
    </div>        
</body>
</html>