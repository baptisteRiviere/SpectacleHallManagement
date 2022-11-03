<?php
    if (! isset($_POST['spectacle_id'])) {

        die("error : spectacle id hasn't been sent");

    } else {

        include "connect.php";
        
        $spectacle_id = $_POST['spectacle_id'];

        /*
        // request to get list of every shows of the spectacle
        $request = "SELECT s.name, s.description, u.lastname, u.firstname 
                    FROM spectacle AS s
                    JOIN user AS u ON s.id_artist = u.id
                    WHERE s.id = $spectacle_id";

        // asking database
        $response = [];
        if ($result = mysqli_query($link,$request)) {
            while ($line = mysqli_fetch_assoc($result)) {
                $response[] = $line;
            }
        }
        */

        // return the list with every information
        echo json_encode(array("error"=>"not ready"));
    }
 ?>
