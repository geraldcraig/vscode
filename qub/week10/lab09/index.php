<?php
	include("dbconn.php");

	$read = "SELECT * FROM myoscars";
	
	$result = $conn->query($read);
	
	if (!$result) {
		echo $conn -> error;
	}
?>

<html>
<head>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<title>Oscars Lab Challenge</title>
</head>

<body>
    <div class="container">

		<div class="row">
			<div class="column column-90">
				<h2>Oscar Winners</h2>
			</div>
			<div class="column">
				<a class="button button-outline" href="admin/editmovies.php">admin</a>
			</div>
		</div>

		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Year</th>
					<th>Winner</th>
				</tr>
			</thead>
			<tbody>
				<?php

					// iterate through result set to display values
					while ($row = $result->fetch_assoc()) {

						$name = $row['movie'];
						$yr = $row["year"];
						$win = $row["winner"];

						if ($win == '1') {
							$win = "<img height='30px' src='media/oscar_win.png'>";
						} else {
							$win = "<img height='30px' src='media/oscar_none.png'>";
						}

						echo "<tr>
								<td>$name</td>
								<td>$yr</td>
								<td>$win</td>

							</tr>";

					}

				?>
			<tbody>
		</table>
	
	</div>
</body>
</html>
