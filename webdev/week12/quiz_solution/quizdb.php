<?php
     include("dbconn.php");

     // Using prepared statement (approach 1)
     /*
     $stmt = $conn->prepare("SELECT * FROM myquiz ");
     $stmt->execute();

     if (!$stmt) {
        echo $stmt->error;
     }

     // get the result set
     $result = $stmt->get_result();

     // close the statement
     $stmt->close();
     */


     // Using prepared statement (approach 2)
     $stmt = $conn->prepare("SELECT id, content FROM myquiz ");
     $stmt->execute();

     if (!$stmt) {
        echo $stmt->error;
     }

     // get the result set
     $stmt->store_result();
     $stmt->bind_result($qid, $question);

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
            
        // Using prepared statement (approach 1 - no different original use of result set)
        /*
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
        */

        // Using prepared statement (approach 2 - result set variables have been 'bound')

        while ($stmt->fetch()){
    
                echo "<div class='row'>";
               
                echo "<div class='col m9'> $question </div>
                            <div class='col m3'>
                                    <a href='questiondb.php?name=Clarke&questid=$qid' class='button'>See answer</a>
                              </div>";
                echo "</div>";
        }
        
        // close the statement
        $stmt->close();

    ?>
         
  </div>
 </body>
</html>