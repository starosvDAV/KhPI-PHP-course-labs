<?php

session_start();
$items = [
    1 => ['name' => 'Книга', 'price' => 120],
    2 => ['name' => 'Ручка', 'price' => 15],
    3 => ['name' => 'Блокнот', 'price' => 45]
];


$cart = $_SESSION['cart'] ?? [];


$prev = [];
if (!empty($_COOKIE['previous_purchases'])) {
    $prev = json_decode($_COOKIE['previous_purchases'], true);
    if (!is_array($prev)) $prev = [];
}
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Магазин</title></head>
<body>
  <h2>Товари</h2>
  <ul>
    <?php foreach ($items as $id => $it): ?>
      <li>
        <?=htmlspecialchars($it['name'])?> — <?= $it['price'] ?> грн
        <form action="add.php" method="post" style="display:inline">
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="submit" value="Додати">
        </form>
      </li>
    <?php endforeach; ?>
  </ul>

  <h3>Ваша корзина</h3>
  <?php if (empty($cart)): ?>
    <p>Корзина пуста</p>
  <?php else: ?>
    <ul>
      <?php foreach ($cart as $id => $qty): ?>
        <li>
          <?=htmlspecialchars($items[$id]['name'])?> — кількість: <?= $qty ?>
          <form action="remove.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Видалити 1">
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
    <form action="checkout.php" method="post">
      <input type="submit" value="Оформити покупку">
    </form>
  <?php endif; ?>

  <h3>Попередні покупки (cookie)</h3>
  <?php if (empty($prev)): ?>
    <p>Немає попередніх покупок</p>
  <?php else: ?>
    <ul>
      <?php foreach ($prev as $p): ?>
        <li><?= htmlspecialchars($p) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>
