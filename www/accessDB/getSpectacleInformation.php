<?php
    if (! isset($_POST['spectacle_id'])) {

        die("error : spectacle id hasn't been sent");

    } else {
        include "connect.php";
        
        $spectacle_id = $_POST['spectacle_id'];

        // request to get list of artists
        $request = "SELECT s.name, s.description, u.lastname, u.firstname 
                    FROM spectacle AS s
                    JOIN user AS u ON s.id_artist = u.id
                    WHERE s.id = $spectacle_id";
        
        if ($result = mysqli_query($link,$request)) {
            echo json_encode(mysqli_fetch_assoc($result));
        } else {
            echo json_encode(array("error"=>"request invalid for getSpectacleInformation"));
        }
    }
 ?>
