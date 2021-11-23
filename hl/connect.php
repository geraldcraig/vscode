<?PHP

$user_name = "root";
$password = "root";
$database = "addressbook";
$server = "localhost";

mysqli_connect($server, $user_name, $password);

print "Connection to the Server opened";

?>