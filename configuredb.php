<?PHP

$user_name = "root";
$password = "root";
//$database = "addressbook";
$server = "localhost";

$db_handle = mysqli_connect($server, $user_name, $password);

print "Connection to the Server opened";

print "Server found" . "<BR>";

$database = "addressbook";

$db_found = mysqli_select_db( $db_handle, $database );

if ($db_found) {

print "Database found";

}

else {

print "Database not found";

}

?>