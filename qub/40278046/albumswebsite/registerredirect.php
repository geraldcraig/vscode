<!DOCTYPE html>
<html lang="en">
<head>
    <title>Record Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Record Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div>
  <h1>Username already taken</h1>
</div>

<div class="container mt-3 bg-secondary">
  <h2>Register form</h2>
	<form name="mylist" method="POST" action="processregister.php" enctype="multipart/form-data">
    <div class="form-group">
			<label for="firstname">First Name:</label> 
			<input type="text" id="firstname" name="firstname" required/>
    </div>

		<div class="form-group">
			<label for="lastname">Last Name:</label> 
			<input type="text" id="lastname" name="lastname" required/>
		</div>

    <div class="form-group">
			<label for="username">Username:</label> 
			<input type="text" id="username" name="username" required/>
		</div>

    <div class="form-group">
			<label for="password">Password:</label> 
			<input type="password" id="password" name="password" required/>
		</div>
    <button type="submit" class="btn btn-primary">Submit</button>	
  </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>