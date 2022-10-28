<?php

  include "connect.php";
  
  $keywords = ["username","firstname","lastname","mail","address","birthdate","password","password_conf"];

  if (isset($_POST['keywords'])) {
    foreach ($_POST['keywords'] as $key){
        if (!(isset($_POST[$key]))) {
          echo json_encode(array('error' => "Error : $key hasn't been well delivered"));
          die();
        }
    }
    
    echo json_encode($_POST['keywords']);

    /*
    $username = $_POST['username'];
    $password = $_POST['password'];

    $requete = "SELECT EXISTS (SELECT * FROM user WHERE username = '$username' AND password = '$password')";

    $response = [];
    if ($result = mysqli_query($link,$requete)) {
      while ($line = mysqli_fetch_assoc($result)) {
        $response = $line;
      }
    }

    $key = array_keys($response)[0];
    $login_valid = $response[$key];
  
    if ($login_valid) {
      session_start();
      $_SESSION['role'] = $_POST['username'];
    }
    echo json_encode(array('login_valid' => $login_valid));
    */

  } else {
    echo json_encode(array('error' => "Error : data hasn't been well delivered"));
  }
  
  
 ?>
