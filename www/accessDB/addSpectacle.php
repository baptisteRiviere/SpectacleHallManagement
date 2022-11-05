<?php

  include "connect.php";
  
  // checking every fields have been delivered
  if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['id_artist'])) {
    
    // get values
    $name         = $_POST["name"];
    $description  = $_POST["description"];
    $id_artist    = $_POST["id_artist"];
 
    // request to write new spectacle in database
    $add_spectacle_request = "INSERT INTO spectacle 
            (name,description,id_artist)
    VALUES  ('$name','$description',$id_artist)";

    // writing request
    if ($result = mysqli_query($link,$add_spectacle_request)) {
      echo json_encode(array("spectacle_added" => true));
    } else {
      echo json_encode(array("error" => "Error : the spectacle hasn't been added"));
    }

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
 ?>
