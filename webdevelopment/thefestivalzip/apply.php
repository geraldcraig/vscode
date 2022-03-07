<?php

include("conn.php");

$genre = "SELECT * FROM BGENRE";
$result = $conn->query($genre);

if(!isset($name)) {
  $name ="";
}

if(!isset($email)) {
  $email ="";
}

if(!isset($video)) {
  $video ="";
}

if(!isset($website)) {
  $website ="";
}

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apply | B Festival</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/herologo.png">

    <!-- individual font and stylesheets -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    
    <!-- framework links and scripts -->
    <?php
      include("modules/framework.html")
    ?>

    <!-- jQuery scrips and animations -->
    <script src="scripts/script.js"></script>
    <script src="scripts/accordian.js"></script>
    <script src="scripts/applyform.js"></script>

    <!-- navbar animation specific to each page -->
    <script>
    // navbar highlighted animation (this needs implemented on each page)
      $(function() {
          $("#contactus a").attr("class", "nav-link");
          $("#contactus a").hover(function() {
            $("#contactus a").attr("class", "nav-link active");
          });

          $("#contactus a").attr("class", "nav-link");
          $("#contactus a").mouseout(function() {
            $("#contactus a").attr("class", "nav-link");
          });
      });  
    </script>
    
  </head>

  <body>
  
    <!-- include navbar -->
    <?php
      include("modules/navbar.php");
    ?>

    <div class="container">
    <h1 class="biotitle text-center">apply</h1>
      <form class ="artistapply" method="POST" action="applydetail.php" enctype="multipart/form-data" novalidate>
      
        <div class="form-row">
          <div class="form-group col">
            <label for="inputEmail4">Band Name</label>
            <input type="text" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} ?>
            overflow-auto" id= "bandname" name="bandname" value="<?php echo htmlspecialchars($name)?>" 
            placeholder="<?php if(isset($isinvalidall)) {echo "$bandph ";} ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="inputEmail4">E-mail</label>
            <input type="email" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";}
            else if(isset($isinvalid1)) {echo "$isinvalid1 ";} ?> 
            overflow-auto" id="emailapply" name="emailapply" value="<?php echo htmlspecialchars($email)?>" 
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1)) {echo "$emailph ";} ?>" required>

            <?php

              if(isset($emailtaken)) {
                echo "<small class='form-text text-danger text-left'>
                $emailtaken
                </small>";
              }
            ?>
          </div>
        </div>
      
        <div class="form-row">
          <div class="form-group col">
          <label for="inputEmail4">Genre</label>
            <select class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            else if(isset($isinvalid1)) {echo "$isinvalid1 ";} else if(isset($isinvalid2)) {echo "$isinvalid2 ";}?> 
            overflow-auto" name="genreref">
              <option value=""><?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2)) 
              {echo "$genreph ";} else { echo "Default select";} ?></option>
                <?php 
                  while($row = $result->fetch_assoc()) {
                    $id = $row['pk_genre_id'];
                    $gen = $row['genre'];
                    echo "<option value='$id'>$gen</option>";
                  }
                ?>
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col">
          <label for="inputEmail4">Upload a Bio Image</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile02" name="bandimage" required>
              <label class="custom-file-label <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
              else if(isset($isinvalid1)) {echo "$isinvalid1 ";} else if(isset($isinvalid2)) {echo "$isinvalid2 ";}
              else if(isset($isinvalid3)) {echo "$isinvalid3 ";}?> 
              overflow-auto" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
              <?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid3)) 
              {echo "$fileph ";} else { echo "Choose File";} ?></label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlTextarea1">Upload your Bio</label>
            <textarea class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            else if(isset($isinvalid1)) {echo "$isinvalid1 ";} else if(isset($isinvalid2)) {echo "$isinvalid2 ";}
            else if(isset($isinvalid3)) {echo "$isinvalid3 ";} else if(isset($isinvalid4)) {echo "$isinvalid4 ";}?> 
            overflow-auto" rows="3" id="bandbio" name="bandbio" value="<?php echo htmlspecialchars($email)?>"
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid3) 
            || isset($isinvalid4)) {echo "$bio";} ?>"
            required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Website</label>
            <input type="text" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            else if(isset($isinvalid1)) {echo "$isinvalid1 ";} else if(isset($isinvalid2)) {echo "$isinvalid2 ";}
            else if(isset($isinvalid3)) {echo "$isinvalid3 ";} else if(isset($isinvalid4)) {echo "$isinvalid4 ";}
            else if(isset($isinvalid5)) {echo "$isinvalid5 ";}?>overflow-auto" 
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid3) 
            || isset($isinvalid4) || isset($isinvalid5)) {echo "$bio";} else { echo "https://www.myband.co.uk";}?>" id="bandsite" 
            name="bandsite" value="<?php echo htmlspecialchars($website)?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">Upload a video</label>
            <input type="text" class="form-control <?php if(isset($isinvalidall)) {echo "$isinvalidall ";} 
            else if(isset($isinvalid1)) {echo "$isinvalid1 ";} else if(isset($isinvalid2)) {echo "$isinvalid2 ";}
            else if(isset($isinvalid3)) {echo "$isinvalid3 ";} else if(isset($isinvalid4)) {echo "$isinvalid4 ";}
            else if(isset($isinvalid5)) {echo "$isinvalid5 ";} else if(isset($isinvalid6)) {echo "$isinvalid6 ";}?> overflow-auto" 
            placeholder="<?php if(isset($isinvalidall) || isset($isinvalid1) || isset($isinvalid2) || isset($isinvalid3)
            || isset($isinvalid4) || isset($isinvalid5) || isset($isinvalid6)) {echo "$video";} 
            else {echo "Please use the youtube embeded video foramt only";} ?>" id="bandvideo" name="bandvideo" 
            value="<?php echo htmlspecialchars($website)?>">
          </div>
        </div>
      
        <div class="input-group">
          <input type="submit" class="btn btn-outline-success input-group-btn" name="artistapply" value="Apply">
        </div>
      </form>
    </div>

    <!-- footer -->
    <?php
      include("modules/footer.html");
    ?>

  </body>
</html>