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

    <div id="add_show">
      <h1>add show</h1>
      <form class="add_show_form" id="add_show_form">
        <input type="date" placeholder="date" id="date"/>
        <input type="time" placeholder="time" id="time">
        <input type="checkbox" placeholder="halfless" id="halfless">
        <select name="id_spectacle" id="id_spectacle"></select>
        <button id="add_show_button">Add show</button>
        <p id="return_add_show"></p>
      </form>
    </div>
    
    <script src="index.js"></script>
  </body>
</html>
