<?php 
    $movie_array = array();

    $urltojson="data/movies.json";

    // get the resource object (open the JSON file and get the contents)
    $contents = file_get_contents($urltojson);

    // convert JSON object to PHP object (array)
    $mydata = json_decode($contents, true);

    //print_r($mydata);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ui.css">

</head>

<body>

    <nav>
        <a href="#" class="brand">
          <img class="logo" src="img/movie_logo.png"/>
          <span>Movie Store</span>
        </a>
        
        <input id="bmenub" type="checkbox" class="show">
        <label for="bmenub" class="burger success button">menu</label>
      
        <div class="menu">
           <a href="#" class="pseudo button">Shop</a>
           <a href="#" class="pseudo button">Sign in</a>
           <a href="#" class="pseudo button">Support</a>       
        </div>
    </nav>
    <?php
    echo "
    <div id='jumbo'>
        <h1>Movies on sale</h1>";
        $movieforjumbo = $mydata[1]['mov_name'];
        echo "$movieforjumbo";

    echo "</div>

    <div id='container'>   
        <div id='dynamic'></div>   
        <div class='flex two three-600 four-1200' id='newrows'>";

        // iterate and use the data
        foreach($mydata as $row) {

            //print_r($row);

            $name = $row['mov_name'];
            $genre = $row['mov_genre'];
            $cost = $row['mov_cost'];
            $date = $row['mov_launch'];


            //print_r($row);

            // echo out content from each line
            echo "<div><span> <article class='card myminheight'>
                  <header><h4>{$name}</h4></header>
                  <p>{$genre}</p>
                  <footer class='myfooter'>
                  <button>£{$cost}</button>
                  </footer></article></span></div>";


        }

        // echo out the closing divs for the container and class
        echo "</div></div>";


    ?>



</body>

</html>