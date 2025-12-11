<?php

session_start();

$items = [
    1 => ['name' => 'Книга', 'price' => 120],
    2 => ['name' => 'Ручка', 'price' => 15],
    3 => ['name' => 'Блокнот', 'price' => 45]
];

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    echo "Корзина порожня. <a href='index.php'>Повернутися</a>";
    exit;
}


$purchaseDesc = [];
foreach ($cart as $id => $qty) {
    $purchaseDesc[] = $items[$id]['name'] . " x" . $qty;
}
$purchaseStr = date('Y-m-d H:i:s') . " — " . implode(', ', $purchaseDesc);


$prev = [];
if (!empty($_COOKIE['previous_purchases'])) {
    $prev = json_decode($_COOKIE['previous_purchases'], true);
    if (!is_array($prev)) $prev = [];
}
$prev[] = $purchaseStr;
if (count($prev) > 20) $prev = array_slice($prev, -20);


setcookie('previous_purchases', json_encode($prev), time() + 30*24*60*60, "/");


unset($_SESSION['cart']);

echo "Покупка оформлена!<br>";
echo nl2br(htmlspecialchars($purchaseStr));
echo "<br><a href='index.php'>Повернутися в магазин</a>";
