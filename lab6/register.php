<?php

require_once 'config.php';


$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';


if ($username === '' || $email === '' || $password === '') {
    die('Усі поля обов\'язкові. <a href="register_form.html">Повернутися</a>');
}


$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1");
$stmt->execute([':username' => $username, ':email' => $email]);
$existing = $stmt->fetch();

if ($existing) {
    die('Користувач з таким ім\'ям або email вже існує. <a href="register_form.html">Повернутися</a>');
}


$hashed = password_hash($password, PASSWORD_DEFAULT);




$insert = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
$insert->execute([
    ':username' => $username,
    ':email' => $email,
    ':password' => $hashed
]);

echo "Реєстрація пройшла успішно. <a href='login_form.html'>Увійти</a>";
