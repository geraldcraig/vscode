<?php

    include("dbconn.php");
 
    $innerjoin = "SELECT movie_reviews.id, movie_reviews.title,    
                         movie_reviews.review, movie_reviews.user, movie_genres.name
                  FROM movie_reviews
                  INNER JOIN
                  movie_genres ON
                  movie_reviews.genre_type = movie_genres.id ";
    

 
    $result = $conn->query($innerjoin);
 
    if (!$result) {
         echo $conn->error;    
    }   
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Movie Reviews Demo</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
 
<body>
    <div class="container">
    
            <div class="row">
                    <div class="column"><h1>Movie Reviews</h1></div>
            </div>

            <?php
                while ($row = $result->fetch_assoc()) {
                    
                    $title_data = $row['title'];
                    $review_data = $row['review'];
                    $genre_data = $row['name'];
                    $user_data = $row['user'];
                
                    echo "<div class='row'>
                          <div class='column column-20'>
                          <p><strong>$title_data</strong><br/>
                          Genre: $genre_data</p>
                          </div><div class='column column-80'>
                          <p>$review_data By: $user_data </p>
                          </div></div>";
                }
            ?>
        
    </div>
</body>
</html>