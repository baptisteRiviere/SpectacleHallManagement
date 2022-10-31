<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
  </head>
  <body>
    <?php include("../scrollmenu.php"); ?>

    <div id="add_spectacle">
      <h1>add spectacle</h1>
      <form class="add_spectacle_form" id="add_spectacle_form">
        <input type="name" placeholder="name" id="name"/>
        <input type="textarea" placeholder="description" id="description"/>
        <select name="id_artist" id="id_artist"></select>
        <button id="add_spectacle_button">Add spectacle</button>
        <p id="return_add_spectacle"></p>
      </form>
    </div>
    
    <script src="index.js"></script>
  </body>
</html>
