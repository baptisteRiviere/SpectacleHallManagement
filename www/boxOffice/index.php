<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le p'tit Rex</title>
    <link rel="stylesheet" href="/boxOffice/boxOffice.css">
  </head>
  <body>
    <?php include("../scrollmenu.php"); ?>
    <div class="main-container">
        <div class="heading">
            <h1 class="heading__title">Box-office</h1>
        </div>
        <div class="cards" id="cards"></div>
    </div>
  </body>

  <script src="index.js"></script>
</html>