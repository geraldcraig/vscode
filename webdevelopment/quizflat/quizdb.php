<?php
        $host = "mwalsh28lampt.eeecs.qub.ac.uk";
        $user = "mwalsh28";
        $pw = "087KTcZP8N8mfPbM";
        $db = "mwalsh28";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "not connected ".$conn->connect_error;
 
        }else{
 
                $check="Connected to your mysql DB.";
 
        }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <title>QUIZ</title>
 
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
                 
        $read = "SELECT * FROM quiz7";
               
        $result = $conn->query($read);
                       
        if(!$result){
                echo $conn->error;
        }
                       
        while ($row = $result->fetch_assoc()){
 
            $question=$row['content'];
           
 
            echo "<div> $question </div>";
         }
    ?>
         
  </div>
 <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
 </body>
</html>
