<?php
    include "connect.php";

    // request to get list of artists
    $request = "SELECT id,location,category,price FROM place";
    
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
