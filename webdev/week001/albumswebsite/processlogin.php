<?php

    $endpoint = "http://localhost/webdev/week00/albumsapi/api.php?user";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);

?>