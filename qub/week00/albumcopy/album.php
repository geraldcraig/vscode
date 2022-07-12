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
<html lang="en">

<head>
    <title>Top Albums</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
			<h1>Top 10 Album Plays</h1>
            <table class="table striped">
			<?php

                echo"<thead>
                        <tr>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Plays</th>
                            <th>Image</th>
                        </tr>
                    </head>";
				while ($row = $result->fetch_assoc()) {

					$title = $row['title'];
                    $name = $row['name'];
					$count = $row['SUM(plays)'];
                    $image = $row['image'];

					echo "<tr>
								<td>$title</td>
                                <td>$name</td>
								<td>$count</td>
                                <td><img src=$image class='img-thumbnail' style='width: 150px'></td>
                            </tr>";
				}
			?>	
            </table>
			
		</div>
</body>
</html>
