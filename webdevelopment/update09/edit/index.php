<?php
//add PHP code from external conn.php
include("../conn.php");
 
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

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <img src="https://image.flaticon.com/icons/svg/1721/1721929.svg"  >
    </a>
        <a class="navbar-item" href='index.php'>
       My List Edit
        </a>

        <a class="navbar-item " href='select.php'>
        Edit Items
        </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
</nav>

<div class="container">


<h1 class="title is-1">
  Admin Menu
</h1>


<a href='select.php'>
   <div class='box'>
      <article class='media'>
        <div class='media-left'>
          <figure class='image is-64x64'>
            <img src='https://image.flaticon.com/icons/svg/2089/2089588.svg' alt='Image'>
          </figure>
        </div>
        <div class='media-content'>
          <div class='content'>
            <p>
              <strong> Add item </strong>
              <br>
            click here to add an item to your list
            </p>
          </div>
        </div>
      </article>
    </div>
</a>

<br>

<a href='add.php'>
   <div class='box'>
      <article class='media'>
        <div class='media-left'>
          <figure class='image is-64x64'>
            <img src='https://image.flaticon.com/icons/svg/1159/1159633.svg' alt='Image'>
          </figure>
        </div>
        <div class='media-content'>
          <div class='content'>
            <p>
              <strong> Select item to edit</strong>
              <br>
            click here to edit an item to your list
            </p>
          </div>
        </div>
      </article>
    </div>
</a>





<br>
</div>

<?php

include("../static/footer.html");

?>
       
</body>
</html>