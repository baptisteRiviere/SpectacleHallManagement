<?php
  //session_start();
  //$_SESSION["role"] = "admin"

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/auth/auth.css">
    <title></title>
  </head>
  <body>

    <?php include("../scrollmenu.php"); ?>

    <div id="container">
      <div class="login-page">
        <div class="form">
          <form class="login-form" id="login-form">
            <input type="text" placeholder="name" id="name"/>
            <input type="password" placeholder="password" id="password"/>
            <button id="login_button">Log in</button>
            <div id="login_error">
            </div>
            <p class="message">Not registered yet ? <a href="signup.php">Sign-up</a></p>
          </form>
        </div>
      </div>


      <script src="index.js"></script>

  </body>
</html>
