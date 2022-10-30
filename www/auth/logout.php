<?php
    session_start();
    session_unset(); 
    $logout_valid = session_destroy();
    echo json_encode(array("logout_valid" => $logout_valid));
?>