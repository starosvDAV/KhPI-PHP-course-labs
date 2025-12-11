<?php

session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: login_form.html');
    exit;
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Welcome</title></head>
<body>
  <h2>Ласкаво просимо, <?= $username ?>!</h2>
  <p>Це захищена сторінка.</p>
  <form action="logout.php" method="post">
    <input type="submit" value="Вийти">
  </form>
</body>
</html>
