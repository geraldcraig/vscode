<?php

  	$fname = $_POST['firstname'];
  	$lname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];


	$endpoint = "http://localhost/qub/week00/albumsapi/api.php?newuser";

  	//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?newuser";

	$postdata = http_build_query(

		array(
      		'addfirstname' => $fname,
     		'addlastname' => $lname,
			'addusername' => $username,
			'addpassword' => $password
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
                header("Location: login.php");
              } else {
				header("Location: registerredirect.php");
                //echo "Unable to add user";
              }
        ?>