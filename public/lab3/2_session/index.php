<?php
session_start();


if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<p>Вітаю, <strong>" . htmlspecialchars($user['login']) . "</strong>! Ви вже увійшли.</p>";
    echo '<form action="logout.php" method="post"><input type="submit" value="Вихід"></form>';
    exit;
}
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Login</title></head>
<body>
  <h2>Форма логіну</h2>
  <form action="login.php" method="post">
    <label>Логін: <input type="text" name="login" required></label><br><br>
    <label>Пароль: <input type="password" name="password" required></label><br><br>
    <input type="submit" value="Увійти">
  </form>
</body>
</html>
