<?php
 
    $fname = $_FILES['myfileupload']['name'];
    $temp = $_FILES['myfileupload']['tmp_name'];
    $fsize = $_FILES['myfileupload']['size'];
    $ftype = $_FILES['myfileupload']['type'];
       
?>
 
<!DOCTYPE html>
<html>
 
<head>
    <meta content="charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width,initial-scale=1">  
    <title>uploader</title>
</head>
<body>
 
 
<?php
 
    if(move_uploaded_file($temp, 'uploaded/'.$fname)){
   
           echo " <p>Thanks for the uploaded file.
                 $fname has been uploaded and it is $fsize bytes.
                  The file extension is $ftype.</p> ";
         }else{      
   
           echo "<p>$fname has been uploaded and it is $fsize bytes.
               The file extension is $ftype. But something went wrong.</p>";
     }
   
?>
 
</body>
</html>
