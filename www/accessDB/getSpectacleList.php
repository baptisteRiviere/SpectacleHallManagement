<?php
    include "connect.php";

    // request to get list of artists
    $request = "SELECT s.name, s.description, u.lastname, u.firstname 
                FROM spectacle AS s
                JOIN user AS u ON s.id_artist = u.id";

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
