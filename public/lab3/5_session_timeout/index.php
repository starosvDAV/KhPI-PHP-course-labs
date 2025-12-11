<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user'] = ['login' => $_POST['login'] ?? 'guest'];
    $_SESSION['last_activity'] = time();
    header('Location: protected.php');
    exit;
}
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Login (timeout)</title></head>
<body>
  <h2>Увійти (сесія з таймаутом 5 хв)</h2>
  <form method="post">
    <label>Логін: <input name="login" required></label>
    <input type="submit" value="Увійти">
  </form>
</body>
</html>
