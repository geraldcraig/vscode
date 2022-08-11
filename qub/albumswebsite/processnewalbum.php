<?php

  	$number = $_POST['number'];
  	$title = $_POST['title'];
	$artist = $_POST['artist'];
	$genre = $_POST['genre'];
	$subgenre = $_POST['subgenre'];
  	$year = $_POST['year'];
	$image = $_POST['image'];


	$endpoint = "http://localhost/qub/albumsapi/api.php?newalbum";

  	//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?newalbum";

	$postdata = http_build_query(

		array(
      		'addnumber' => $number,
     		'addtitle' => $title,
			'addartist' => $artist,
			'addgenre' => $genre,
     		'addsubgenre' => $subgenre,
			'addyear' => $year,
			'addimage' => $image
		)

	);

	$opts = array(

		'http' => array(
			'method' => 'POST',
			'header' => 'Content-Type: application/x-www-form-urlencoded',
			'content' => $postdata
		)

	);

	$context = stream_context_create($opts);
	$resource = file_get_contents($endpoint, false, $context);

	echo $resource;

              if($resource != FALSE) {
                header("Location: index.php");
              } else {
				header("Location: registerredirect.php");
                //echo "Unable to add user";
              }
        ?>