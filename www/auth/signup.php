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
      <div class="signup-page">
        <div class="form">
          <form class="signup-form" id="signup-form">
            <input type="text" placeholder="username" id="username"/>
            <input type="text" placeholder="firstname" id="firstname"/>
            <input type="text" placeholder="lastname" id="lastname"/>
            <input type="text" placeholder="mail" id="mail"/>
            <input type="text" placeholder="adress" id="adress"/>
            <input type="date" placeholder="birthdate" id="birthdate"/>
            <input type="password" placeholder="password" id="password"/>
            <input type="password" placeholder="confirm password" id="confirm password"/>
            <button id="signup_button">Sign up</button>
            <div id="signup_error">
            </div>
          </form>
        </div>
      </div>


      <script src="signup.js"></script>

  </body>
</html>
