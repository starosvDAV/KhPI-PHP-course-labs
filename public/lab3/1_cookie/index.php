<?php

$cookieName = 'username';
$username = $_COOKIE[$cookieName] ?? '';

?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Cookie — лабораторна</title></head>
<body>
  <h2>Введіть ваше ім'я (cookie на 7 днів)</h2>
  <?php if ($username): ?>
    <p>Вітаю, <strong><?= htmlspecialchars($username) ?></strong>! (збережено в cookie)</p>
  <?php endif; ?>

  <form action="set_cookie.php" method="post">
    <label>Ім'я: <input type="text" name="name" required></label>
    <input type="submit" value="Зберегти в cookie">
  </form>

  <form action="delete_cookie.php" method="post" style="margin-top:10px;">
    <input type="submit" value="Видалити cookie">
  </form>
</body>
</html>
