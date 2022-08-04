<?php

    session_start();

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $endpoint = "http://localhost/qub/week00/albumsapicopy/api.php?adminlogin";

    //$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?adminlogin";

    $postdata = http_build_query(

        array('addusername' => $uname,
                'addpassword' => $upass)

    );

    $opts = array(

        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )

    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, true, $context);

    echo $resource;

    if ($resource !== FALSE && $uname == 'admin') {
        $_SESSION['admin'] = $uname;
	    header("Location: adminaccount.php");
    } else {
	    header("Location: adminlogin.php");
    }
?>