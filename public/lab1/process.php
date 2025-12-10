<?php

$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';


if (empty($firstName) || empty($lastName)) {
    echo "Помилка: Всі поля повинні бути заповнені!<br>";
    echo '<a href="index.html">Повернутися назад</a>';
    exit;
}


if (!preg_match("/^[a-zA-Zа-яА-ЯїієґЁё'\-]+$/u", $firstName) ||
    !preg_match("/^[a-zA-Zа-яА-ЯїієґЁё'\-]+$/u", $lastName)) {
    echo "Помилка: Ім'я та прізвище повинні містити лише літери!<br>";
    echo '<a href="index.html">Повернутися назад</a>';
    exit;
}


echo "<h2>Вітаю, $firstName $lastName!</h2>";
echo "<p>Дані отримано успішно.</p>";
echo '<a href="index.html">Повернутися назад</a>';
?>
