<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['id_spectacle'])) {
    
    // get values
    $date         = $_POST["date"];
    $time         = $_POST["time"];
    $halfless     = $_POST["halfless"];
    $id_spectacle = $_POST["id_spectacle"];
    $datetime = "$date" . " " . "$time" . ":00";
 
    // request to write new spectacle in database
    $add_show_request = "INSERT INTO showdate
            (datetime,halfless,id_spectacle)
    VALUES  ('$datetime',$halfless,$id_spectacle)";

    // writing request
    if ($result = mysqli_query($link,$add_show_request)) {
      echo json_encode(array("show_added" => true));
    } else {
      echo json_encode(array("error" => "Error : the show hasn't been added"));
    }

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  
  }
  
 ?>
