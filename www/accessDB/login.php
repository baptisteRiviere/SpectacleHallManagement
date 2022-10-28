<?php
  if ((isset($_POST['username'])) && (isset($_POST['password']))) {
    // select * from login where password = password('april');
    $login_valid = (($_POST['username'] == "admin") && ($_POST['password'] == "admin"));
    if ($login_valid) {
      session_start();
      $_SESSION['role'] = $_POST['username'];
    }
    echo json_encode(array('login_valid' => $login_valid));

  } else {
    echo json_encode(array('erreur' => "Error: the username has not be posted"));
    //echo json_encode(array('erreur' => "Erreur de connexion à la base de données"));
  }
 ?>
