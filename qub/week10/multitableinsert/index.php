<?php
	include("dbconn.php");

    // read data from two tables linked by foreign key (type_id)
	$readtables = "SELECT myusers.name, myuserstypes.role 
                   FROM myusers
                   INNER JOIN myuserstypes
                   ON myusers.type_id = myuserstypes.type_id";
	
	$result = $conn->query($readtables);
	
	if (!$result) {
		echo $conn -> error;
	}
?>

<html>
<head>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<title>Multiple Table Insert Demo</title>
</head>

<body>
    <div class="container">

		<div class="row">
			<div class="column column-90">
				<h2>Contents of Tables</h2>
			</div>
		</div>

		<table>
			<thead>
				<tr>
					<th>User</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// iterate through result set to display values
					while ($row = $result->fetch_assoc()) {

						$name = $row['name'];
						$role = $row["role"];

						echo "<tr>
								<td>$name</td>
								<td>$role</td>
							</tr>";
					}
				?>
			<tbody>
		</table>
	
	</div>
</body>
</html>
