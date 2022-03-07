<?php
//add PHP code from external conn.php
include("conn.php");
 
?>
<!DOCTYPE html>
<html>
 
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>my list 09</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<div class="container">

<?php
 
$read = "SELECT * FROM mylist09 order by datedue ASC";
 
$result = $conn->query($read);
 
if(!$result){
        echo $conn->error;
}

?>

<h1 class="title is-1">
My List
</h1>

<?php
while ($row = $result->fetch_assoc()) {
 
  $info_data = $row["info"];
  $get_date = $row["datedue"];
  $get_date = date('d-m-Y', strtotime($get_date));
  $row_id = $row['id'];
  $type_data = $row['type'];
  $details_data = $row['details'];

    echo "<div class='box'>
      <article class='media'>
        <div class='media-left'>
          <figure class='image is-64x64'>
            <img src='https://image.flaticon.com/icons/svg/2438/2438255.svg' alt='Image'>
          </figure>
        </div>
        <div class='media-content'>
          <div class='content'>
            <p>
              <strong> $info_data </strong> <small> $get_date</small> <small>$type_data</small>
              <br>
              $details_data 
            </p>
          </div>
        </div>
      </article>
    </div>";

}
?>

<br>
</div>

<?php

include("static/footer.html");

?>
       
</body>
</html>