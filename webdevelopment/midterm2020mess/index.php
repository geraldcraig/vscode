<?php

$webserver = "mwalsh28.lampt.eeecs.qub.ac.uk";
$user = "mwalsh28";
$pw = "087KTcZP8N8mfPbM";
$db = "mwalsh28";

$conn = new mysqli($webserver, $user, $pw, $db);

if($conn->connect_error) {
    echo "Connection failed".$conn->connect_error;
}

$read = "SELECT * FROM mid_term";
$result = $conn->query($read);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top 5 CSS Frameworks</title>

    <link rel="stylesheet" href="ui.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
</head>
<body>

    <div class="container">
        <header class="pagehead">

        <div style="overflow: hidden;height: 250px;"> <!-- For Demo, Represents the body -->

            <nav class="demo">
            <a href="#" class="brand">
                <img class="logo" src="img/logo.png" />
                <span>the design blog</span>
            </a>

            <!-- responsive-->
            <input id="bmenub" type="checkbox" class="show">
            <label for="bmenub" class="burger pseudo button">&#9776;</label>

            <div class="menu">
                <a href="#" class="pseudo button icon-picture">posts</a>
                <a href="#" class="pseudo button icon-picture">authors</a>
                <a href="#" class="pseudo button icon-picture">search</a>
                
            </div>
            </nav>

</div>


            
        </header>

        <main class="content">
                <div class="flex three-1100 two-900">
                <?php

                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $framework = $row["framework"];
                        $description = $row["description"];
                        $url = $row["url"];

                        echo "<div><span>
                                
                                    <p>$id <strong>$framework</strong></p>
                                    <p>$description</p>
                                    <a class ='button' id='urlbutton' href='$url'>Go</a>
                                
                            </span></div>";
                    }
                ?>
                
            </div>
        </main>
    </div>
</body>
</html>