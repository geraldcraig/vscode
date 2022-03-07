<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">

        <title>
        PHP Loop
        </title>
        <link rel="stylesheet" href="ui.css" type="text/css">
    </head>

    <body>
        <div id="head">
            <h1>My Shopping List</h1>
        </div>

    <div class="main">

        <ol id="shoplist">
            <?php 
            
            $shopping = array('wine', 'fish', 'bread', 'grapes', 'cheese', 'loo roll', 'toothpaste');

            $shoppingsize = count($shopping);

            for($i = 0; $i < $shoppingsize; $i++) {

                echo "<li> {$shopping[$i]}</li>";
            } 
            
            ?>
        </ol>
    </div>

    </body>
</html>