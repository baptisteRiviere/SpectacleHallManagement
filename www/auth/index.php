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
          <form class="login-form">
            <input type="text" placeholder="name" id="name_login"/>
            <input type="password" placeholder="password" id="password_login"/>
            <button id="button_login">Log in</button>
            <div id="error_login">
            </div>
            <p class="message">Not registered yet ? <a href="signup.php">Sign-up</a></p>
          </form>
        </div>
      </div>



  </body>
</html>
