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
    
    <div id="add_spectacle">
      <h1>add spectacle</h1>
      <form class="add_spectacle_form" id="add_spectacle_form">
        <input type="name" placeholder="name" id="name"/>
        <input type="textarea" placeholder="description" id="description"/>
        <select name="artist" id="artist">
          <option value="20">0-20 ans</option>
          <option value="40" selected>21-40 ans</option>
          <option value="60">41-60 ans</option>
          <option value="80">61-80 ans</option>
        </select>

        <button id="add_spectacle_button">Add spectacle</button>
        
      </form>
    </div>
  </body>
</html>
