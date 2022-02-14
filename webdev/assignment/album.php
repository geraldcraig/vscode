<?php
    //include("php/functions.php");
    include("connections/dbconn.php");

    $album = htmlentities($_GET['album_id']);
    
    $albumquery = "SELECT album.id, album.number, album.title, artist.name, album.year
                    FROM album
                    INNER JOIN artist
                    ON album.artist_id = artist.id
                    WHERE album.id = '$album' "; 
    
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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 

	<div id='container'> 
		
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