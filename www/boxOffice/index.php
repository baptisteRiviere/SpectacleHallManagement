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
    <div id="box_office">
      <h1>Box-office</h1>
      <form method=GET action="spectacle.php" class="box_office_form" id="box_office_form"></form>
    </div>
  </body>

  <script src="index.js"></script>
</html>