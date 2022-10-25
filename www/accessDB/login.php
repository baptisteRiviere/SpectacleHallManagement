<?php
  if ((isset($_POST['name'])) && (isset($_POST['password']))) {
    // select * from login where password = password('april');
    $login_valid = (($_POST['name'] == "admin") && ($_POST['password'] == "admin"));
    if ($login_valid) {
      session_start();
      $_SESSION['role'] = $_POST['name'];
    }
    echo json_encode(array('login_valid' => $login_valid));

  } else {
    echo json_encode(array('erreur' => "Error: the name has not be posted"));
    //echo json_encode(array('erreur' => "Erreur de connexion à la base de données"));
  }
 ?>
