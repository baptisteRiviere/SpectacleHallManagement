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
    <link rel="stylesheet" href="/boxOffice/showdate.css">
  </head>
  <body>
    <?php include("../scrollmenu.php"); ?>

    <input type=hidden id=showdate_id value=<?php echo $_GET["showdate_id"]; ?>>
    <input type=hidden id=user_id value=<?php echo $_SESSION["id"]; ?>>
    
    <div class="main-container">

      <div id="places" class="places"></div>

      <div id="information" class="information">
        <p id="place_category"></p>
        <p id="place_price"></p>
        <p id="place_location"></p>
      </div>

      <div id="book" class="book">
        <p id="message"></p>
        <button id="book_button" type>Book selected places</button>
      </div>
    
    </div>

  </body>

  <script src="showdate.js"></script>
</html>