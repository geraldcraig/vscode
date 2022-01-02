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

$query  = "SELECT * FROM album_list";
$result = $pdo->query($query);

while ($row = $result->fetch()) 
{
echo 'Number: '     . htmlspecialchars($row['number'])          . "<br>";
echo 'Title: '      . htmlspecialchars($row['year'])           . "<br>";
echo 'Artist ID: '  . htmlspecialchars($row['album'])       . "<br>"; 
echo 'Year ID: '    . htmlspecialchars($row['artist'])         . "<br>"; 
echo 'Genre ID: '   . htmlspecialchars($row['genre'])        . "<br>";
echo 'Genre ID: '   . htmlspecialchars($row['subgenre'])        . "<br>";
echo 'Genre ID: '   . htmlspecialchars($row['thumbnail'])        . "<br>";
echo 'Subgenre ID: '. htmlspecialchars($row['cover'])     . "<br><br>";
}
?>