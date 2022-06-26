<?php

    include("dbconn.php");
  
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $username = $_GET['username'];
    $userpassword = $_GET['userpassword'];

    // Using prepared statement (approach 1)
    /*
    $stmt = $conn->prepare("SELECT * FROM myquiz WHERE id = ? ");
    $stmt->bind_param('i', $questionid);
    $stmt->execute();
               
    if (!$stmt) {
        echo $stmt -> error;
    }

    // get the result set
    $result = $stmt->get_result();

    // close the statement
    $stmt->close();
    */

    // Using prepared statement (approach 2)
    $stmt = $conn->prepare("SELECT firstname, lastname FROM user WHERE id = ? ");
    $stmt->bind_param('i', $questionid);
    $stmt->execute();
               
    if (!$stmt) {
        echo $stmt -> error;
    }

    // get the result set
    $stmt->store_result();
    $stmt->bind_result($firstname, $lastname);

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
            echo "<h3>$username</h3>";

            // Using prepared statement (approach 1)
            /*
            while ($row = $result->fetch_assoc()) {
                
                $question = $row['content'];
                $answercontent = $row['answer'];
             
                echo "<div> $question </div>";
                echo "<h4 class='_floatRight'> $answercontent </h4>";
            }
            */

            // Using prepared statement (approach 2
            while ($stmt->fetch()) {

              echo "<div> $firstname </div>";
              echo "<h4 class='_floatRight'> $lastname </h4>";

            }

            // close the statement
            $stmt->close();
          
      ?>
         
   </div>
  </body>
</html>