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
    <?php include("../scrollmenu.php"); ?>

    <div id="information">
      <p id="username"></p>
      <p id="firstname"></p>
      <p id="lastname"></p>
      <p id="mail"></p>
      <p id="address"></p>
      <p id="birthdate"></p>
    </div>

    <div id="booked_tickets">
      <h1>Tickets booked</h1>
    </div>

    <div id="logout">
      <form class="logout_form" id="logout_form">
        <button id="login_button">Log out</button>
      </form>
    </div>


    <script src="index.js"></script>

    
  </body>
</html>
