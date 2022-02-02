<?php
    //start sessions
    session_start();
    
    // check to see if user has played a previous game
    // if not then reset score
    if (!isset($_SESSION['player_score'])) {
        $_SESSION['player_score'] = 0;
    }

    // check to see if computer has played a previous game
    // if not then reset score
    if (!isset($_SESSION['computer_score'])) {
        $_SESSION['computer_score'] = 0;
    }
    
    // get the player choice
    $player_choice = $_POST["playerChoice"];

    // include the functions file
    include("functions.php");

    // call the playgame function
    $result = playgame($player_choice);

    // get the computer choice from $result
    $computer_choice = $result['choice'];

    // get the winner from $result
    $winner = $result['winner'];
 
?>
 
<!DOCTYPE html>
 
<html>
 
<head>
    <title>Rock Paper Scissors (PHP Function)</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="myui.css">
</head>
 
<body>
    <div class="container container-width">
    
        <div class="row">
            <div class="column center">

                <div class="row">
                    <div class="column">
                        <?php 
                            echo "<h2><strong>And the winner is ... {$winner}</strong></h2>"; 
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <?php
                            $player_score = $_SESSION['player_score'];
                            echo "<h2>Player Choice</h2>";
                            if (($winner == "Player") || ($winner == "DRAW")) {
                                echo "<h2><strong>{$player_choice}</strong></h2>";
                            } else {
                                echo "<h2>{$player_choice}</h2>";
                            }
                            echo "<h4>player score:</h4>";
                            echo "<h4>{$player_score}</h4>";
                        ?>
                    </div>
                    
                    <div class="column">
                        <h2> vs </h2>
                    </div>
                    
                    <div class="column">
                        <?php
                            $computer_score = $_SESSION['computer_score'];
                            echo "<h2>Computer Choice</h2>";
                            if (($winner == "Computer") || ($winner == "DRAW")) {
                                echo "<h2><strong>{$computer_choice}</strong></h2>";
                            } else {
                                echo "<h2>{$computer_choice}</h2>";
                            }
                            echo "<h4>computer score:</h4>";
                            echo "<h4>{$computer_score}</h4>";
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <a href="indexfun.html" class="button button-outline button-black">
                            New Game
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>