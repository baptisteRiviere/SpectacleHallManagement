<?php
  session_start();
?>

<link rel="stylesheet" href="/css/style.css">
<div class="scrollmenu">
  <a href="/index.php">Home</a>

  <?php if (isset($_SESSION['status'])): ?>
    <a href="/account/index.php">Me</a>
  <?php else: ?>
    <a href="/boxOffice/index.php">Box-office</a>
    <a href="/auth/index.php">Sign-in</a>
    <a href="/auth/signup.php">Sign-up</a>
  <?php endif; ?>

  <?php if ($_SESSION['status'] == "ADMIN"):?>
    <a href="/admin/index.php">Admin</a>
  <?php endif; ?>

</div>
