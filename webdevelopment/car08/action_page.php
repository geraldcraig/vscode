<?php

include("connect.php");

$name = $_POST['carname'];
$email = $_POST['caremail'];
$car = $_POST['cartype'];
$timeuploaded = date("Y-m-d H:i:s");


$query = "INSERT INTO carevote08(carname, caremail, cartype, timeuploaded) VALUES ('$name','$email','$car', '$timeuploaded')";
$result = $conn->query($query);

$countford = "SELECT COUNT(cartype) FROM carevote08 WHERE cartype LIKE 'ford'";
$fordcount = $conn->query($countford);

if(!$result) {
    echo $conn->error;
}

?>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    
</head>

<body>

<div id='head'>
	<h2>Cars 4 U</h2> 
	<a href='index.php'><img src='https://assets.dryicons.com/uploads/icon/svg/6925/f91e74a4-1aa4-4819-870c-d49dda424f9e.svg'>
	</a>
</div>

<div class="container customwidth">
 
    <?php
        if(!$result) {
            echo $conn->error;
        }
        else {
        echo "<h3>thanks for your vote<h3>";
        while($row = $fordcount->fetch_assoc()) {
            
            $total = $row['cars'];

            echo "Ford; $total";
        }
        }
    ?>

<canvas id="myChart"></canvas>
			
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Skoda', 'Volvo', 'Ford', 'Kia'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            <?php echo "data: [$total, 10, 5, 2, 20, 30, 45]"?>
        }]
    },

    // Configuration options go here
    options: {}
});
    </script>

</body>
</html>
