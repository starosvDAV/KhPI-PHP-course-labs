<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: " . $_SERVER['PHP_SELF'] . "?note=please_post");
    exit;
}


$clientIp = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$self = $_SERVER['PHP_SELF'] ?? 'Unknown';
$method = $_SERVER['REQUEST_METHOD'] ?? 'Unknown';
$path = __FILE__;
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Server Info</title></head>
<body>
  <h2>Інформація про сервер та запит</h2>
  <ul>
    <li>IP-адреса клієнта: <?= htmlspecialchars($clientIp) ?></li>
    <li>Браузер (User-Agent): <?= htmlspecialchars($userAgent) ?></li>
    <li>Назва скрипта (PHP_SELF): <?= htmlspecialchars($self) ?></li>
    <li>Метод запиту: <?= htmlspecialchars($method) ?></li>
    <li>Шлях до файлу на сервері: <?= htmlspecialchars($path) ?></li>
  </ul>
  <p><a href="../">Повернутися</a></p>
</body>
</html>
