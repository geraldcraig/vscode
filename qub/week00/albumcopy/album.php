<?php

include ("dbconn.php");

?>

<!DOCTYPE html>
<html>
<body>

<h1>Top 10 Album Count Test</h1>

<?php
    
    $read = "SELECT SUM(plays), album_plays.album_id, album.title, artist.name
	FROM album
    INNER JOIN artist
    ON album.artist_id = artist.id
    INNER JOIN album_plays
    ON album.id = album_plays.album_id
    INNER JOIN album_image
    ON album.id = album_image.album_id
    INNER JOIN image
    ON album_image.image_id = image.id
    GROUP BY album_plays.album_id
    ORDER BY SUM(plays) DESC
    LIMIT 10";
    
    $result = $conn->query($read);

	if (!$result) {
		echo $conn->error;
	}

    //var_dump(json_decode($result));

    ?>

<div id="content">
			<h1>Top 10 Album Plays</h1>

            
			<?php

                echo "<thead>
                        <tr>
                            <th>album id</th>
                            <th>count</th>    
                        </tr>
                    </thead>";

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
