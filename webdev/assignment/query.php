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
echo 'Year: '      . htmlspecialchars($row['year'])           . "<br>";
echo 'Album: '  . htmlspecialchars($row['album'])       . "<br>"; 
echo 'Artist: '    . htmlspecialchars($row['artist'])         . "<br>"; 
echo 'Genre: '   . htmlspecialchars($row['genre'])        . "<br>";
echo 'SubGenre: '   . htmlspecialchars($row['subgenre'])        . "<br>";
echo 'Thumbnail: '   . htmlspecialchars($row['thumbnail'])        . "<br>";
echo 'Cover: '. htmlspecialchars($row['cover'])     . "<br><br>";
}
?>