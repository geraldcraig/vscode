<!DOCTYPE html>
<html lang="en">
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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Record Collection Website</h1>
    <p>Website for Top 500 albums.<p>
  </div>

		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
			</ul>
		</nav>

    <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">
        <?php
            echo "<div><h2>Login</h2></div>
                <form method='POST' action='processlogin.php'>
                <div class='form-group'>
                <label>Username</label>
                <input name='uname' type='text' class='metro-input' required='required' placeholder='Enter your first name'>
                </div>
                <div class='form-group'>
                <label>Password</label>
                <input name='pword' type='password' class='metro-input' required='required' placeholder='Enter your password'>
                </div>
                <input class='button yellow outline pl-10 pr-10 mt-10 place-right' type='submit' value='login'>
                </form>";     
        ?>
    </div>

</body>
</html>