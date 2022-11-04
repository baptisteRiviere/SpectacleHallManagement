<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['id_showDate']) && isset($_POST['id_place'])) {
    
    // get values
    $id_showDate  = $_POST["id_showDate"];
    $id_place     = $_POST["id_place"];
 
    // request to write new spectacle in database
    $add_ticket_request = "INSERT INTO ticket 
                                (id_showDate,id_place)
                                VALUES  ($id_showDate,$id_place)";

    // writing request
    if ($result = mysqli_query($link,$add_ticket_request)) {
      echo json_encode(array("ticket_added" => true));
    } else {
      echo json_encode(array("error" => "Error : the ticket hasn't been added"));
    }

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
 ?>
