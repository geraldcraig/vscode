<?php

include ("dbconn.php");
    
    $read = "SELECT SUM(plays), title, name, image FROM album_plays
    INNER JOIN album
    on album_plays.album_id = album.id
    INNER JOIN artist
    ON album.artist_id = artist.id
    INNER JOIN image
    ON album.image_id = image.id
    GROUP BY album_plays.album_id
    LIMIT 10";
    
    $result = $conn->query($read);

	if (!$result) {
		echo $conn->error;
	}

    //var_dump(json_decode($result));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Albums</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="content">
			<h1>Top 10 Album Plays</h1>

            
			<?php

				while ($row = $result->fetch_assoc()) {

					$albumid = $row['title'];
					$count = $row['SUM(plays)'];

					echo "<thead>
                            <tr>
								<td>$albumid</td>
								<td>$count</td>
                            </tr>
                        </thead>";
				}
			?>	
			
		</div>
</body>
</html>
