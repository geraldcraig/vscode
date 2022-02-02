<?php

    function playgame($player_selection) {

        // generate computer choice
        $computer_array = array("rock", "paper","scissors");
        $array_size = count($computer_array);
        $rand_num = rand(0, 2);
        $computer_choice = $computer_array[$rand_num];
    
        // determine a winner or draw
        if (($player_selection == "rock" && $computer_choice == "scissors" ) ||
            ($player_selection == "paper" && $computer_choice == "rock" ) ||
            ($player_selection == "scissors" && $computer_choice == "paper" )) {

            $winner = "Player";  
            $_SESSION['player_score'] = $_SESSION['player_score'] + 1;

        } elseif ($player_selection == $computer_choice) {

            $winner = "DRAW";

        } else {
            $winner = "Computer";
            $_SESSION['computer_score'] = $_SESSION['computer_score'] + 1; 
        }

        // create an array to return the computer choice and winner 
        $retval = array("choice" => $computer_choice, "winner" => $winner);
        
        //print_r($retval);
        return $retval;
    }

?>