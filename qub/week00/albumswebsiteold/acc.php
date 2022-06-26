<?php

include("dbconn.php");

// prepare and bind
$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, userpassword) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $username, $userpassword);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$username = "john@example.com";
$userpassword = "pwd";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$username = "mary@example.com";
$userpassword= "pwd";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$username = "julie@example.com";
$userpassword= "pwd";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>