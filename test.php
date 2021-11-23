<?PHP
require 'hl/configure.php';

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );

$database = "todo";

$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

$SQL = "SELECT * FROM task";
$result = mysqli_query($db_handle, $SQL);

while ( $db_field = mysqli_fetch_assoc($result) ) {
 
print $db_field['task'] . "<BR>";
print $db_field['description'] . "<BR>";
print $db_field['date'] . "<BR>";
print $db_field['status'] . "<BR>";

}

}
else {

print "Database NOT Found ";

}

mysqli_close($db_handle);

?>