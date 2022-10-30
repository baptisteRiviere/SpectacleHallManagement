<?php
    session_start();

    include "connect.php";

    // getting the username
    $username = $_SESSION["username"];

    // request to get information about the user
    $request = "SELECT username,firstname,lastname,mail,address,birthdate FROM user WHERE username = '$username'";
    
    // asking database
    $response = [];
    if ($result = mysqli_query($link,$request)) {
        while ($line = mysqli_fetch_assoc($result)) {
            $response[] = $line;
        }
    }

    // return the list with every information
    echo json_encode($response);
 ?>
