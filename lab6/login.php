<?php

session_start();
require_once 'config.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    die('Усі поля обов\'язкові. <a href="login_form.html">Повернутися</a>');
}


$stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username LIMIT 1");
$stmt->execute([':username' => $username]);
$user = $stmt->fetch();

if (!$user) {
    die('Невірний логін або пароль. <a href="login_form.html">Повернутися</a>');
}

$storedHash = $user['password'];


if (password_verify($password, $storedHash)) {

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header('Location: welcome.php');
    exit;
}


if ($storedHash === md5($password)) {

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];


    $newHash = password_hash($password, PASSWORD_DEFAULT);
    $upd = $pdo->prepare("UPDATE users SET password = :p WHERE id = :id");
    $upd->execute([':p' => $newHash, ':id' => $user['id']]);

    header('Location: welcome.php');
    exit;
}

die('Невірний логін або пароль. <a href="login_form.html">Повернутися</a>');
