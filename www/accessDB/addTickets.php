<?php

  include "connect.php";


  // checking every fields have been delivered
  if (isset($_POST['id_showDate'])) {
    
    
    // get values
    $id_showDate  = $_POST["id_showDate"];

    if (isset($_POST['halfless'])) {
      $halfless  = $_POST["halfless"];
    } else {
      $halfless = false;
    }

    // getting avery places id
    $places_request = "SELECT id,location_y FROM place";
    $places_response = [];
    if ($result = mysqli_query($link,$places_request)) {
      while ($line = mysqli_fetch_assoc($result)) {
        $places_response[] = $line;
      }
    }

    // for each place a ticket is created
    $add_ticket_request = "INSERT INTO ticket (id_showDate,id_place,id_spectator) VALUES";     // request to write new spectacle in database
    foreach ($places_response as $place) {
      $id_place = $place["id"];
      if (filter_var($halfless, FILTER_VALIDATE_BOOLEAN) and ((int) $place["location_y"] % 2 === 0)) {
        $add_ticket_request .= " ($id_showDate,$id_place,2),";
      } else {
        $add_ticket_request .= " ($id_showDate,$id_place,NULL),";
      }
    }
    $add_ticket_request = substr_replace($add_ticket_request,";",-1);

    // writing request
    if ($result = mysqli_query($link,$add_ticket_request)) {
      echo json_encode(array("tickets_added" => true));
    } else {
      echo json_encode(array("error" => "Error : the tickets hasn't been added"));
    }

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
 ?>
