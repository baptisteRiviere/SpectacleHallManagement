<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le p'tit Rex</title>
  </head>
  <body>
    <?php include("scrollmenu.php"); ?>
    <p>Bienvenue au p'tit Rex, une salle de spectacle pour le moins surprenante</p>
    <img src="img/trex.png">
  </body>

  <div id="Box_office">
      <h1>Box-office</h1>
      <form class="spectacle_choice" id="spectacle_choice"></form>
      <button id="login_button">voir</button>
    </div>

  <script src="index.js"></script>
</html>
