<?php

$conn = new mysqli('mwalsh28.lampt.eeecs.qub.ac.uk', 'mwalsh28', '087KTcZP8N8mfPbM', 'mwalsh28');

if($conn ->connect_error) {
    echo "there has been an error" .$conn ->connect_error;
}

?>