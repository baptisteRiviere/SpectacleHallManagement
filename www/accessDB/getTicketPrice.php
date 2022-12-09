<?php
    if (! isset($_POST['ticket_id'])) {

        die("error : ticket id hasn't been sent");

    } else {
        include "connect.php";

        $ticket_id = $_POST['ticket_id'];

        $get_ticket_price_request = "SELECT sp.showdate_price + pl.price AS ticket_price
                                    FROM ticket as ti
                                    JOIN (	SELECT sd.id AS id_showdate, sp.price AS showdate_price
                                            FROM spectacle as sp
                                            JOIN showdate as sd ON sd.id_spectacle = sp.id) AS sp
                                    ON ti.id_showdate = sp.id_showdate
                                    JOIN place AS pl
                                    ON pl.id = ti.id_place
                                    WHERE ti.id = $ticket_id";



        // asking database
        if ($result = mysqli_query($link,$get_ticket_price_request)) {
            $price = (int) mysqli_fetch_assoc($result)["ticket_price"];
            echo json_encode(array("ticket_price" => $price));
        }
    }
 ?>
