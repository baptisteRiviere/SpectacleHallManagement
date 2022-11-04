<?php
  if (!isset($_GET["showdate_id"])) {
    die("error : showdate id hasn't been sent");
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

    <input type=hidden id=showdate_id value=<?php echo $_GET["showdate_id"]; ?>>

    <p><?php echo $_GET["showdate_id"];  ?></p>

  </body>

  <script src="spectacle.js"></script>
</html>