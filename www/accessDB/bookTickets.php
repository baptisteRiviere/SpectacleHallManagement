<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['selected_tickets']) && isset($_POST['user_id'])) {
    
    // get values
    $selected_tickets  = json_decode($_POST["selected_tickets"],true);
    $user_id  = $_POST["user_id"];

    $ticket_booked = false;
    foreach ($selected_tickets as $ticket) {
      $ticket_id = $ticket["id"];
      $book_ticket_request = "UPDATE ticket SET id_spectator = $user_id WHERE id = $ticket_id;";
      if ($result = mysqli_query($link,$book_ticket_request)) {
        $ticket_booked = true;
      } else {
        $ticket_booked = false;
        break;
      }
    }

    if ($ticket_booked) {
      echo json_encode(array("ticket_booked" => true));
    } else {
      echo json_encode(array("error" => "Error : the ticket hasn't been booked"));
    }
  
  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
  
 ?>
