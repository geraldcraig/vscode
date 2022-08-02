<?php
    include("dbconn.php");
   
    $id = $_GET['userid'];
   
    $read = "SELECT * FROM user WHERE id='$id' ";
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
            
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $username = $row['username'];
            $pword = $row['userpassword'];
            $userid = $row['id'];
                       
            echo "<form action='processedit.php' method='POST'>
                   <div class='grid-x'>
                       <div class='small-8 cell'> 
                       
                            <input value='$fname' type='text' name='firstname'>
                            <input value='$lname' type='text' name='lastname'>
                            <input value='$username' type='text' name='username'>
                            <input value='$pword' type='password' name='password'>
                            <input value='$userid' type='hidden' name='id'>

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