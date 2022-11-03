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

    <p>
      <?php 
        echo $_GET["spectacle_id"];
        
      ?>
    </p>

    <div id="presentation">
      <h1>Presentation</h1>
      <p>description</p>
    </div>

  </body>

  <script src="spectacle.js"></script>
</html>