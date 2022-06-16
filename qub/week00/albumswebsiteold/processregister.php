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
?>
 
<!DOCTYPE html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
 
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Record Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.php'>Log In</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='register.php'>Register</a>
          </li>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
  </div>
</nav>
		
		<div id="main">
      <article>
         
        <?php
              if($resource != FALSE) {
                header("Location: index.php");
              } else {
                echo "Unable to add user";
              }
        ?>

      </article>
		</div>
	</div>
</body>

</html>