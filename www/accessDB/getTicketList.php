<?php

    include "connect.php";

    $request = "SELECT ti.id, ti.id_spectator, pl.location, pl.category, pl.price FROM ticket AS ti
                JOIN place as pl ON ti.id_place = pl.id";

    if (isset($_POST['showdate_id'])) {
        $showdate_id = $_POST['showdate_id'];
        $request = $request . " WHERE ti.id_showDate = $showdate_id";
    } 
        
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