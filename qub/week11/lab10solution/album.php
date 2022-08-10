<?php
    include("php/functions.php");
    include("connections/dbconn.php");

    $album = htmlentities($_GET['album_id']);
    
    $albumquery = "SELECT mytopalbums.id, mytopalbums.year, 
                          mytopalbums.title, mytopartists.name
                   FROM mytopalbums
                   INNER JOIN mytopartists
                   ON mytopalbums.artist_id = mytopartists.id
                   WHERE mytopalbums.id = '$album' ";
    
    $result = $conn->query($albumquery);
    
    if (!$result) {
        echo $conn->error;
    }
    
    while ($row = $result->fetch_assoc()) {

        $namedata = $row['name'];
        $titledata = $row['title'];
        $yeardata = $row['year'];
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Albums Challenge</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
<body> 

	<div id='container'> 

		<a href='index.php'>
			<div id="header">
		
			</div>
		</a>

		<nav>
			<ul id='mynav'>
				<?php

					$navbar = displaynav();

				?>
			</ul>
		</nav>
		
		<div id="content">
            <?php 
			    echo "<div><h1>$titledata</h1></div>
                      <div class='album'>
                        <h2>Artist: $namedata</h2>
					    <h3>Album: $titledata</h3>
					    <p>Release Date: $yeardata</p>
					  </div>
                      <div><img src='img/albumart/$album.jpg'></div>";
			?>	
		</div>
		
		
		<div id='containerb'>
			<div id='ftext'> Top Albums | By BBB online</div>
		</div>
		
	</div>

</body>
</html>