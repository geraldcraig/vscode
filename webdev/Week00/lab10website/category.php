<?php
	include("php/functions.php");
	include("connections/dbconn.php");

    $filterdata = htmlentities($_GET['filter']);

	$readquery = "SELECT mytopalbums.id, mytopalbums.year, mytopalbums.title, 
                  mytopartists.name
	              FROM mytopalbums
				  INNER JOIN mytopartists
				  ON mytopalbums.artist_id = mytopartists.id
                  WHERE mytopartists.name = '$filterdata' ";

	$result = $conn->query($readquery);

	if (!$result) {
		echo $conn->error;
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Albums Lab Challenge</title>
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
            <h1><?php echo $filterdata; ?></h1>
            <?php
                while ($row = $result->fetch_assoc()) {

                    $titledata = $row['title'];
                    $yeardata = $row['year'];
                    $albumid = $row['id'];

                    echo "<a href='album.php?album_id=$albumid'>
                            <div class='box'>
                                <h3>$titledata</h3>
                                <p>$yeardata</p>
                            </div>
                        </a>";
                }
			?>
            
        </div>
            
        <div id='containerb'>
            <div id='ftext'>Top Albums | By BBB online</div>
        </div>

    </div>
 
</body>
</html>