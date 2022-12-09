<?php

    include "connect.php";

    $request = "SELECT ti.id, ti.id_spectator, pl.location_x, pl.location_y, pl.category,sp.showdate_price + pl.price AS price
                FROM ticket as ti
                JOIN (	SELECT sd.id AS id_showdate, sp.price AS showdate_price
                        FROM spectacle as sp
                        JOIN showdate as sd ON sd.id_spectacle = sp.id) AS sp
                ON ti.id_showdate = sp.id_showdate
                JOIN place AS pl
                ON pl.id = ti.id_place";


    if (isset($_POST['id_showdate'])) {
        $id_showdate = $_POST['id_showdate'];
        $request = $request . " WHERE ti.id_showDate = $id_showdate";
    } 
        
    // asking database
    $response = [];
    if ($result = mysqli_query($link,$request)) {
        while ($line = mysqli_fetch_assoc($result)) {
            $line["price"] = intval($line["price"]);
            $response[] = $line;
        }
    }

    // return the list with every information
    echo json_encode($response);
 ?>

