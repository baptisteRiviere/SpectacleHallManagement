<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['ticket_id'])) {
    
    // get value
    $ticket_id  = $_POST["ticket_id"];

    // request to write new spectacle in database
    $add_ticket_request = "UPDATE ticket SET id_spectator = NULL WHERE ticket.id = $ticket_id";

    // writing request
    if ($result = mysqli_query($link,$add_ticket_request)) {
      echo json_encode(array("ticket_canceled" => true));
    } else {
      echo json_encode(array("error" => "Error : the ticket hasn't been canceled"));
    }
  
  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
  
 ?>
