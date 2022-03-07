<?php

    // include("quizdb.php");

    //   $filename = "QuizQuestions.txt";
    //   $rfile = fopen($filename, "r");
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
 
       <ol>
 
       <?php
       
        $count = 0;
                while ($line = fgets($rfile)) {
                    $count++;

                    $linecount = count(file($filename));
                       
                    $question=rand(1, $linecount);
 
                        if($count == $question){
                            $dataline = explode("," , $line);
 
                            echo "<li>$dataline[0]</li>";
                        }
                }
         ?>
 
        </ol>
   </div>
   <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
  </body>
</html>
