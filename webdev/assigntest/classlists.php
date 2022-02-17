<?php

    include("dbconn.php");
 
    $innerjoin = "SELECT student_details.sname, student_details.year, student_classes.class_name
                  FROM student_enrolments
                  INNER JOIN
                  student_details ON
                  student_enrolments.student_id = student_details.id
                  INNER JOIN
                  student_classes ON
                  student_enrolments.class_id = student_classes.id ";
 
    $result = $conn->query($innerjoin);
 
    if (!$result) {
         echo $conn->error;    
    }   
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Many to Many Insert Demo</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
 
<body>
    <div class="container">
    
            <div class="row">
                    <div class="column"><h1>Albums List</h1></div>
            </div>

            <table>
			<thead>
				<tr>
					<th>Album</th>
                    <th>Year</th>
					<th>Genre</th>
				</tr>
			</thead>
			<tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                        
                        $name_data = $row['sname'];
                        $year_data = $row['year'];
                        $class_data = $row['class_name'];
                    
						echo "<tr>
								<td>$name_data</td>
                                <td>$year_data</td>
								<td>$class_data</td>
							</tr>";
                    }
                ?>
			<tbody>
		</table>
        
    </div>
</body>
</html>