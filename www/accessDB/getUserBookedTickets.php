<?php
    session_start();

    include "connect.php";

    // getting the username
    $username_id = $_SESSION["id"];

    // request to get information about the user
    $request = "SELECT spec.spectacle_name, spec.spectacle_id, spec.show_datetime, ti.id 
                FROM ticket as ti
                JOIN (	SELECT sp.name AS spectacle_name, sp.id AS spectacle_id, sd.datetime AS show_datetime, sd.id AS id_showdate
                        FROM spectacle as sp
                        JOIN showdate as sd ON sd.id_spectacle = sp.id) AS spec
                ON ti.id_showdate = spec.id_showdate
                WHERE ti.id_spectator = $username_id";

    
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
