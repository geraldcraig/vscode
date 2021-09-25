<?php
$database = "bookstore";
$user = "root";
$password = "root";
$host = "localhost";
$mysqli = new mysqli();
$mysqli ->connect($host, $user, $password, $database);
$mysqli ->set_charset("utf8");

$sql = 'SELECT title, FROM books WHERE 1;';
$result = $mysqli ->query($sql);
echo $result;

$insertsql = 'INSERT INTO books (title, author_id, price) VALUES ("My new book", "3", "38");'
$mysqli ->query($insertsql);
$newestbook = $mysqli->insert_id;

?>
