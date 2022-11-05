<?php

    include "connect.php";

    $request = "SELECT * FROM ticket";

    if (isset($_POST['showdate_id'])) {
        $showdate_id = $_POST['showdate_id'];
        $request = $request . " WHERE id_showDate = $showdate_id";
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
