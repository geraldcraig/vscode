<?php 
require_once 'login.php';

try
{
  $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e) 
{
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query  = "SELECT * FROM album_list_updated";
$result = $pdo->query($query);

while ($row = $result->fetch()) 
{
echo 'Number: '     . htmlspecialchars($row['COL 1'])          . "<br>";
echo 'Title: '      . htmlspecialchars($row['COL 2'])           . "<br>";
echo 'Artist ID: '  . htmlspecialchars($row['COL 3'])       . "<br>"; 
echo 'Year ID: '    . htmlspecialchars($row['COL 4'])         . "<br>"; 
echo 'Genre ID: '   . htmlspecialchars($row['COL 5'])        . "<br>";
echo 'Subgenre ID: '. htmlspecialchars($row['COL 6'])     . "<br><br>";
}
?>