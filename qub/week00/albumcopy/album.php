<?php

include ("dbconn.php");

?>

<!DOCTYPE html>
<html>
<body>

<h1>Top 10 Album Count Test</h1>

<?php
    
    $read = "SELECT SUM(count), album_id
    FROM album_plays
    GROUP BY album_id";
    
    $result = $conn->query($read);

	if (!$result) {
		echo $conn->error;
	}

    var_dump(json_decode($result));

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

					$titledata = $row['album_id'];
					$yeardata = $row['count'];

					echo "<div>
								<h3>$titledata</h3>
								<h3>$yeardata</h3>
							</div>";
				}
			?>	
			
		</div>
</body>
</html>
