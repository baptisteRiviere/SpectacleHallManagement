<?php


  $link = mysqli_connect('mysql-rivierebaptiste.alwaysdata.net', '290208_public', 'ThisIsAPassword', 'rivierebaptiste_concerthall');

  //Vérification du lien
  if (!$link) {
    echo json_encode(array('error' => "the connexion to the databse has failed"));
    die('connexion error');
  } else {
    mysqli_set_charset($link, "utf8");
  }

?>