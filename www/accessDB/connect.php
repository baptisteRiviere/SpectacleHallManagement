<?php

  $link =  mysqli_connect('localhost','root','root','concertHall');
  $link->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
  mysqli_set_charset($link, "utf8");
  if (mysqli_connect_error()) {
    die('error : the connexion to the databse has failed');
  }

?>