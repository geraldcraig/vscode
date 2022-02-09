<?php

    include("dbconn.php");

    if (isset($_POST['reviewChoice'])) {

        $reviewer = $_POST['reviewChoice'];

        $innerjoin = "SELECT movie_reviews.title, movie_reviews.review, movie_users.username, movie_genres.name
                      FROM movie_reviews
                      INNER JOIN
                      movie_genres ON
                      movie_reviews.genre_type = movie_genres.id
                      INNER JOIN
                      movie_users ON
                      movie_reviews.user = movie_users.id
                      WHERE movie_users.username = '$reviewer' ";

        $result = $conn->query($innerjoin);

        if (!$result) {
            echo $conn->error;    
        }  
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
                <?php
                    if ($reviewer) {
                        echo "<div class='column'><h1>$reviewer's Movie Reviews</h1></div>";
                    } else {
                        echo "<div class='column'><h1>User Movie Reviews</h1></div>";
                    }
                    ?>
                    <!-- <div class="column"><h1>User Movie Reviews</h1></div>-->
            </div>

            <?php
                if ($reviewer) {

                    while ($row = $result->fetch_assoc()) {
                        
                        $title_data = $row['title'];
                        $review_data = $row['review'];
                        $genre_data = $row['name'];
                        $user_data = $row['username'];
                    
                        echo "<div class='row'>
                            <div class='column column-20'>
                            <p><strong>$title_data</strong><br/>
                            Genre: $genre_data</p>
                            </div><div class='column column-80'>
                            <p>$review_data</p>
                            </div></div>";
                    }
                } else {
                    echo "No reviewer selected!";
                }
            ?>
        
    </div>
 
</body>
</html>