<?php

    session_start();

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    //$endpoint = "http://localhost/qub/40278046/albumsapi/api.php?adminlogin";

    $endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?adminlogin";

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
    $resource = file_get_contents($endpoint, false, $context);

    echo $resource;

    if ($resource !== FALSE) {
        header("Location: adminlogin.php");
    } elseif ($uname == 'admin') {
        $_SESSION['admin'] = $uname;
	    header("Location: adminaccount.php");
    } else {
        header("Location: adminlogin.php");
    }

?>