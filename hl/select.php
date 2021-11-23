<?PHP
require 'configure.php';

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );

$database = "addressbook";

$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

$SQL = "SELECT * FROM tbl_address_book";
$result = mysqli_query($db_handle, $SQL);

while ( $db_field = mysqli_fetch_assoc($result) ) {

print $db_field['id'] . "<BR>";
print $db_field['first_name'] . "<BR>";
print $db_field['surname'] . "<BR>";
print $db_field['address'] . "<BR>";

}

}
else {

print "Database NOT Found ";

}

mysqli_close($db_handle);

?>