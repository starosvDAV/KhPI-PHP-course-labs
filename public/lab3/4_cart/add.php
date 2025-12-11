<?php

session_start();
$id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 0;
$_SESSION['cart'][$id] += 1;

header('Location: index.php');
exit;
