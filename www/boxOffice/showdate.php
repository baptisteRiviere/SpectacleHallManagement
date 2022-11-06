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

    <div id="places"></div>

    <div id="information">
      <p id="place_category"></p>
      <p id="place_price"></p>
      <p id="place_location"></p>
      <button id="book" type>Select</button>
    </div>
  </body>

  <script src="showdate.js"></script>
</html>