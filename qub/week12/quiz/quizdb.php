<?php
     include("dbconn.php");

     $read = "SELECT * FROM myquiz ";
               
     $result = $conn->query($read);
                    
     if (!$result) {
        echo $conn -> error;
     }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>Quiz</title>
 
  <style>
     #mycontent{
                 font-weight:bold;
                 margin: 20px auto;
                                 width: 70%;
         }
      .mymodules{
                 font-size:14px;
                 padding:10px;
                                 margin: 5px;
                 background: #eee;
       }
  </style>
 
  <body>
   <div id='mycontent'>
      <h1>Quiz</h1>
         
     <?php       
            
        
        while ($row = $result->fetch_assoc()){
 
            $question = $row['content'];
            $qid = $row['id'];

            echo "<div class='row'>";
           
            echo "<div class='col m9'> $question </div>
                        <div class='col m3'>
                                <a href='questiondb.php?name=Clarke&questid=$qid' class='button'>See answer</a>
                          </div>";
            echo "</div>";
        }

    ?>
         
  </div>
 </body>
</html>