<?php

session_start();
$id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}
if (!empty($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] -= 1;
    if ($_SESSION['cart'][$id] <= 0) unset($_SESSION['cart'][$id]);
}
header('Location: index.php');
exit;
