<?php
 
    include("dbconn.php");
 
    $innerjoin = "SELECT students.s_name, classes.class_name
                 FROM enrolments
                 INNER JOIN
                 students ON
                 enrolments.stu_id = students.id
                 INNER JOIN
                 classes ON
                 enrolments.class_id = classes.id ";
 
    $result = $conn->query($innerjoin);
 
    if (!$result) {
         echo $conn->error;    
    }  
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Many to Many</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
 
<body>
    <div class="container">
   
            <div class="row">
                    <div class="column"><h1>Class Lists</h1></div>
            </div>
 
            <table>
                        <thead>
                                <tr>
                                        <th>Student</th>
                                        <th>Class</th>
                                </tr>
                        </thead>
                        <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                       
                        $name_data = $row['s_name'];
                        $class_data = $row['class_name'];
                   
                                                echo "<tr>
                                                                <td>$name_data</td>
                                                                <td>$class_data</td>
                                                        </tr>";
                    }
                ?>
                        <tbody>
                </table>
       
    </div>
</body>
</html>
