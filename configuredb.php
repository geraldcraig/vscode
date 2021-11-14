<?PHP

$user_name = "root";
$password = "root";
//$database = "addressbook";
$server = "localhost";

$db_handle = mysqli_connect($server, $user_name, $password);

print "Connection to the Server opened";

print "Server found" . "<BR>";

$database = "hotels.com";

$db_found = mysqli_select_db( $db_handle, $database );

if ($db_found) {

print "Database found";

}

else {

print "Database not found";

}

$sql = "SELECT first_name FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["customer_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. " ".
    $row["email"]. " ". $row["password"]. " ". $row["phone_number"]. " ". $row["membership_number"]. 
    " ". $row["country_id"]. " ". $row["payment_id"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>