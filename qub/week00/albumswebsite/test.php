<?php

include ("dbconn.php"); // Database connection using PDO

$readquery = "SELECT username,id FROM user order by username"; 

	$result = $conn->query($readquery);

	if (!$result) {
		echo $conn->error;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Album Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
<body>

<?php
//$sql="SELECT name,id FROM albums"; 

$sql="SELECT username,id FROM user order by username"; 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select id=name name=name class='form-control' style='width:100px;'>Student Name</option>"; // list box select command

while ($row = $result->fetch_assoc()) {//Array or records stored in $row

echo "<option value=$row[id]>$row[username]</option>"; 

/* Option values are added by looping through the array */ 

}

 echo "</select>";// Closing of list box

 ?>

 </body>
</html>