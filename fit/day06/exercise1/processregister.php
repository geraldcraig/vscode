<?php

  	$fname = $_POST['firstname'];
  	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];


	$endpoint = "http://localhost/fit/day06/exercisefive/api.php?newuser";

	$postdata = http_build_query(

		array(
      		'addfirstname' => $fname,
     		'addlastname' => $lname,
			'addemail' => $email,
			'addcomment' => $comment
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
                header("Location: contactus.php");
              } else {
				header("Location: contactus.php");
                //echo "Unable to add user";
              }
        ?>