<?php

    header("Content-Type: application/json");

    
    // get user
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['user']))) {

        include ("dbconn.php");
    
        $read = "SELECT * FROM user";

        $result = $conn->query($read);
        
        if (!$result) {
            echo $conn -> error;
        }
    
        // build a response array
        $api_response = array();
        
        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);
        
        // echo out the response
        echo $response;

    }

    // post add user
    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['userlogin']))) {

        include('dbconn.php');

        $firstname = $conn->real_escape_string($_POST['addfirstname']);
        $lastname = $conn->real_escape_string($_POST['addlastname']);
        $email = $conn->real_escape_string($_POST['addemail']);
        $comment = $conn->real_escape_string($_POST['addcomment']);

        $checkemail = "SELECT * FROM user WHERE email = '$email' ";

        $result = $conn->query($checkemail);

        if (!$result) {
            echo $conn->error;
        }

        $num = $result->num_rows;

        if ($num == 0) {

            $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, comment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstname, $lastname, $email, $comment);
            $stmt->execute();
            $stmt->close(); 

        } else {
            header("Location: contactus.php");
            //echo "username already exists";
        }

    }

    // post user login
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['userlogin']))) {

        include('dbconn.php');

        $uname = $conn->real_escape_string($_POST['addusername']);
        $upass = $conn->real_escape_string($_POST['addpassword']);

        $checkuser = "SELECT * FROM user WHERE username = '$uname' AND userpassword = MD5('$upass') ";

        $result = $conn->query($checkuser);
    
        if (!$result) {
	        echo $conn->error;
        } 

        $num = $result->num_rows;

        if ($num > 0) {

            header("Location: index.php");
            
        } 

    }

    // update user
    if (($_SERVER['REQUEST_METHOD']==='PUT') && (isset($_GET['updateuser']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_PUT);

        $firstname = $conn->real_escape_string($_PUT['addfirstname']);
        $lastname = $conn->real_escape_string($_PUT['addlastname']);
        $username = $conn->real_escape_string($_PUT['addusername']);
        $userpassword = $conn->real_escape_string($_PUT['addpassword']);
        $userid = $conn->real_escape_string($_PUT['adduserid']);

        $updatequery = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', userpassword = MD5('$userpassword')
        WHERE id = '$userid' ";

        $result = $conn->query($updatequery);

        if (!$result) {
            echo $conn->error;
        }

    }

    // delete user
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deleteuser']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $userid = $_DELETE['deleteid'];
    
        $deleterequest="DELETE FROM user WHERE id = $userid";
           
        $result = $conn->query($deleterequest);
        
        if(!$result) {
            
            echo $conn->error;
        
        }
        
    }
  
?> 
