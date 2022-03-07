
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qub rent</title>
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>

<div id='head'>
	<h2>Cars 4 U</h2> 
	<a href='index.php'><img src='https://assets.dryicons.com/uploads/icon/svg/6925/f91e74a4-1aa4-4819-870c-d49dda424f9e.svg'>
	</a>
</div>

<div class="container customwidth">
 <h3>What is your favourite car brand?<h3>
<form method="POST" action="action_page.php">

<!-- form input control -->
<div class="form-group">
  <label class="form-label" for="input-example-1">Name</label>
  <input class="form-input" type="text" id="input-example-1" placeholder="Name" name="carname" required>
  <label class="form-label" for="input-example-2">E-mail</label>
  <input class="form-input" type="text" id="input-example-2" placeholder="email" name="caremail" required>
  <!-- form select control -->
<div class="form-group">
  <select class="form-select" name="cartype" required>
    <option>Choose an option</option>
    <option value="volvo">Volvo</option>
    <option value="skoda">Skoda</option>
    <option value="ford">Ford</option>
	<option value="kia">Kia</option>
  </select>
</div>
<div class="input-group">
	<input type="submit" class="btn input-group-btn" value="vote">
</div>
</div>

</form>


			
</div>

</body>
</html>
