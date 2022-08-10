<html>   
   <head>
      <title>Setting up a PHP session</title>
   </head>   
   <body>
      <?php  
         //Creating a custom session id
         session_id("my-id");
         //Starting the session
         session_start();   
         print("Id: ".session_id());
      ?>
   </body>   
</html> 