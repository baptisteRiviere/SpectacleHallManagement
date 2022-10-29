<?php

  include "connect.php";

  if ((isset($_POST['username'])) && (isset($_POST['password']))) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $request = "SELECT EXISTS (SELECT * FROM user WHERE username = '$username' AND password = '$password')";

    $response = [];
    if ($result = mysqli_query($link,$request)) {
      while ($line = mysqli_fetch_assoc($result)) {
        $response = $line;
      }
    }

    $key = array_keys($response)[0];
    $login_valid = $response[$key];
  
    if ($login_valid) {
      session_start();
      $_SESSION['role'] = $_POST['username'];
    } else {
      echo json_encode(array('login_valid' => $login_valid));
    }

  } else {
    echo json_encode(array('error' => "Error: please complete username and password"));
  }
  
 ?>
