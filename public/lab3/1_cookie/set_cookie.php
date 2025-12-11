<?php
// 1_cookie/set_cookie.php
$cookieName = 'username';
$name = trim($_POST['name'] ?? '');

if ($name === '') {
    header('Location: index.php');
    exit;
}

set cookie($cookieName, $name, time() + 7*24*60*60, "/");
header('Location: index.php');
exit;
