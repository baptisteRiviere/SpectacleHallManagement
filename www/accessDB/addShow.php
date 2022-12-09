<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['id_spectacle'])) {
    
    // get values
    $date         = $_POST["date"];
    $time         = $_POST["time"];
    $id_spectacle = $_POST["id_spectacle"];
    $datetime = "$date" . " " . "$time" . ":00";
 
    // request to write new spectacle in database
    $add_show_request = "INSERT INTO showdate
                        (datetime,id_spectacle)
                        VALUES  ('$datetime',$id_spectacle)";

    // writing request
    if ($result = mysqli_query($link,$add_show_request)) {
      $getting_id_request = "SELECT MAX(id) AS id FROM showdate";
      if ($result = mysqli_query($link,$getting_id_request)) {
        echo json_encode(mysqli_fetch_assoc($result));           
      }
    } else {
      echo json_encode(array("error" => "Error : the show hasn't been added"));
    }

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  
  }
  
 ?>
