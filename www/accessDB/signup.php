<?php

  include "connect.php";
  
  $keywords = ["username","firstname","lastname","mail","address","birthdate","password","password_conf"];

  // checking every fields have been delivered
  if (isset($_POST['keywords'])) {
    foreach ($_POST['keywords'] as $key){
        if (!(isset($_POST[$key]))) {
          echo json_encode(array('error' => "Error : $key hasn't been well delivered"));
          die();
        }
    }
    
    // writing request to check username is available
    $username = $_POST["username"];
    $username_existing_request = "SELECT EXISTS (SELECT * FROM user WHERE username = '$username')";
    
    // sending request
    $response = [];
    if ($result = mysqli_query($link,$username_existing_request)) {
      while ($line = mysqli_fetch_assoc($result)) {
        $response = $line;
      }
    }

    // analysing response
    $key = array_keys($response)[0];
    $username_existing = $response[$key];
  
    // testing if the username already exists
    if ($username_existing) { 
      echo json_encode(array('error' => "Error : the username already exists"));
    } else { 
      // username valid

      // get values
      $firstname      = $_POST["firstname"];
      $lastname       = $_POST["lastname"];
      $mail           = $_POST["mail"];
      $address        = $_POST["address"];
      $birthdate      = $_POST["birthdate"];
      $password       = $_POST["password"];
      $password_conf  = $_POST["password_conf"];

      // checking if both password are identicals
      if ($password != $password_conf) {
        echo json_encode(array("error" => "Error : passwords are differents"));
      } else {
        // request to write new user in database
        $write_user_request = "INSERT INTO user 
                (username,firstname,lastname,mail,address,birthdate,password)
        VALUES  ('$username','$firstname','$lastname','$mail','$address','$birthdate','$password')";

        // writing request
        if ($result = mysqli_query($link,$write_user_request)) {
          echo json_encode(array("signup_valid" => true));
        } else {
          echo json_encode(array("error" => "Error : the user hasn't been added"));
        }
      }
    }
  
  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
 ?>
