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
        <label>name<input type="name" placeholder="name" id="name"/></label>
        <label>description<input type="textarea" placeholder="description" id="description"/></label>
        <label>artist<select name="id_artist" id="id_artist"></select></label>
        <label><button id="add_spectacle_button">Add spectacle</button>
        <p id="return_add_spectacle"></p>
      </form>
    </div>

    <div id="add_show">
      <h1>add show</h1>
      <form class="add_show_form" id="add_show_form">
        <label>date<input type="date" placeholder="date" id="date"/></label>
        <label>time<input type="time" placeholder="time" id="time"></label>
        <label>half less<input type="checkbox" placeholder="halfless" id="halfless"></label>
        <label>spectacle<select name="id_spectacle" id="id_spectacle"></select></label>
        <button id="add_show_button">Add show</button>
        <p id="return_add_show"></p>
      </form>
    </div>
    
    <script src="index.js"></script>
  </body>
</html>
