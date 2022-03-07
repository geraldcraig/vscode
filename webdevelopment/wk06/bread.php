<?php

include('db.php');
include('header.html');

//$instrument = 'guitar';
$readbeatles = "SELECT * FROM webDbeatles06";

$readresult = $conn ->query($readbeatles);

if (!$readresult) {
    echo $conn ->error;
}
?>

 
<body>
 
    <div class="mui-col-sm-10 mui-col-sm-offset-1">
 
        <h2>Arrays</h2>
        <p>The members in the band the beatles are </p>
        
        <?php
        //echo "<ol>";
        while ($row = $readresult -> fetch_assoc()){
       
            $member = $row['member'];
            $instrument = $row['instrument'];
   
            echo 
            /*"<div class='mui-row'>
            <div class='mui-col-md-6'><div class='mui-panel'><strong>$member</strong></div></div>
            <div class='mui-col-md-6'><div class='mui-panel'>$instrument</div></div>
            </div>*/

            "<div class='mui-dropdown'>
  <button class='mui-btn mui-btn--primary' data-mui-toggle='dropdown'>
  <strong>$member</strong>
    <span class='mui-caret'></span>
  </button>
  <ul class='mui-dropdown__menu'>
    <li>$instrument</li>
  </ul>
</div>
                         
                    ";
    }
        //echo "</ol>";
        ?>
    </div>
 
</body>
 
</html>
