<?php
      //declare variables with values
      $startyear = 2000;
      $name = "Peter Parker";
      $uniname = 'Central Washington'.' University';
      $finishyear = 2003;

      //calculate years spent
      $yearsenrolled = $finishyear - $startyear;

      //calculate a static dataset
      $grads = array();

      $student1 = array("stname" => "John", "start"=>2002, "end"=>2007);
      $student2 = array("stname" => "Ringo", "start"=>2001, "end"=>2008);
      $student3 = array("stname" => "Paul", "start"=>2003, "end"=>2007);
      $student4 = array("stname" => "George", "start"=>2005, "end"=>2012);

      array_push ($grads, $student1);
      array_push ($grads, $student2);
      array_push ($grads, $student3);
      array_push ($grads, $student4);
?>

<!DOCTYPE html> 
  <html lang="en"> 
    <head> 
     <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <title>PHP Variables</title> 
     <link rel="stylesheet"   
href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css"> 
    <link rel="stylesheet" href="ui.css">
  </head> 
  <body> 
    <div class="container">

      <h2> Class of <?php echo $finishyear; ?> </h2>

      <table class="u-full-width">
      <thead>
          <tr>
          <th>Name of Student</th>
          <th>Start of Studies</th>
          <th>Year Graduated</th>
          <th>Number of Years</th>
          <th>Years Since Graduation</th>
          </tr>
      </thead>
      <tbody>
          <?php

            $year =  gmdate("Y");  
            for ($row=0; $row < count($grads); $row++) {

                    $name_s = $grads[$row] ["stname"];
                    $start_y = $grads[$row] ["start"];
                    $end_y = $grads[$row] ["end"];
                    $years_y = $end_y - $start_y;
                    $left_y = $year - $end_y;
                    

                    echo "<tr>
                      <td>$name_s</td>
                      <td>$start_y</td>
                      <td>$end_y</td>
                      <td>$years_y</td>
                      <td>$left_y</td>
                  </tr>";
            }
              
          ?>
      </tbody>
</table>
      <?php

          //print_r ($grads);

          //echo "<div id='variable'> {$name} started {$uniname} in the year {$startyear} and 
         // finished in {$finishyear}. </div>";

          //echo "<div id='year'>Spending {$yearsenrolled} year(s) at {$uniname}.</div>";

      ?>
    </div>
  </body> 
</html> 