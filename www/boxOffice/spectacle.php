<?php
  if (!isset($_GET["spectacle_id"])) {
    die("error : spectacle id hasn't been sent");
  } else {
    session_start();
  }  
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le p'tit Rex</title>
  </head>
  <body>
    <?php include("../scrollmenu.php"); ?>

    <input type=hidden id=spectacle_id value=<?php echo $_GET["spectacle_id"]; ?>>

    <div id="presentation">
      <h1 id="title"></h1>
      <p id="artist"></p>
      <p id="description"></p>
    </div>

  </body>

  <script src="spectacle.js"></script>
</html>