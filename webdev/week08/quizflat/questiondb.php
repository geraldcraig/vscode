<?php
        $host = "localhost";
        $user = "testuser";
        $pw = "password";
        $db = "mytestdb";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        } else {
 
                $check="Connected to MySql DB.";
 
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
     
            $myname = $_GET['name'];

            $questionid = $_GET['questid'];
               
            echo "<h3>$myname</h3>";
               
            $read = "SELECT * FROM myquiz WHERE id = '$questionid' ";
               
            $result = $conn -> query($read);
                       
            if (!$result) {
                echo $conn -> error;
            }
           
            while ($row = $result->fetch_assoc()) {
               
                $question = $row['content'];
                $answercontent = $row['answer'];
             
                echo "<div> $question </div>";
                echo "<h4 class='_floatRight'> $answercontent </h4>";
            }
      ?>
         
   </div>
  </body>
</html>


