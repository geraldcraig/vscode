<?PHP
require 'configure.php';

$database = "addressbook";

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
$db_found = mysqli_select_db($db_handle, $database );

if ($db_found) {

$SQL = "INSERT INTO tbl_address_book (First_Name, Surname, Address) VALUES ('Paul', 'McCartney', 'Penny Lane')";

$result = mysqli_query($db_handle, $SQL);

mysqli_close($db_handle);

print "Records added to the database";

}
else {

print "Database NOT Found ";

}

?>