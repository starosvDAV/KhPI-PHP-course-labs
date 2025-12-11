<?php
session_start();


$valid_users = [
    'student' => 'password123',
    'admin' => 'adminpass'
];

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($valid_users[$login]) && $valid_users[$login] === $password) {

    $_SESSION['user'] = ['login' => $login];
    header('Location: index.php');
    exit;
} else {
    echo "Невірний логін або пароль. <a href='index.php'>Повернутися</a>";
}
