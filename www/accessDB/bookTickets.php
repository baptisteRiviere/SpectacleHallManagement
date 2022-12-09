<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['selected_tickets']) && isset($_POST['user_id'])) {
    
    // get values
    $selected_tickets  = json_decode($_POST["selected_tickets"],true);
    $user_id  = $_POST["user_id"];
    $id_showdate  = $_POST["id_showdate"];

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
      $request_get_spectator = "SELECT id_spectator FROM ticket WHERE id_showDate = $id_showdate";
      $response_get_spectator = [];
      if ($result = mysqli_query($link,$request_get_spectator)) {
          while ($line = mysqli_fetch_assoc($result)) {
              $response_get_spectator[] = $line;
          }
      }
      
      $complete = true;
      foreach($response_get_spectator as $row) {
        if ($row["id_spectator"] == null) {
          $complete = false;
          break;
        }
      }
      
      if ($complete) {
        $request_update_showdate = "UPDATE showdate SET complete = 1 WHERE id = $id_showdate;";
        if ($result = mysqli_query($link,$request_update_showdate)) {
          echo json_encode(array("spectacle_complete" => true, "ticket_booked" => true));
        } else {
          echo json_encode(array("error" => "Error : spectacle is complete but database hasn't been updated"));
        }
      } else {
        echo json_encode(array("ticket_booked" => true));
      }

      
    } else {
      echo json_encode(array("error" => "Error : the ticket hasn't been booked"));
    }
  
  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
  
 ?>
