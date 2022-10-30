<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include("../scrollmenu.php"); ?>

    <div id="information">
      <p>quelques petites informations sur toi</p>
    </div>

    <div id="basket">
      <p>basket</p>
    </div>

    <div id="logout">
      <form class="logout_form" id="logout_form">
        <button id="login_button">Log out</button>
      </form>
    </div>


    <script src="index.js"></script>

    
  </body>
</html>
