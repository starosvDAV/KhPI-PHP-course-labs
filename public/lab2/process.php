<?php

$uploadDir = "uploads/";


if (!isset($_FILES['file'])) {
    echo "Файл не отримано!";
    exit;
}

$file = $_FILES['file'];


if ($file['error'] !== UPLOAD_ERR_OK) {
    echo "Помилка завантаження файлу!";
    exit;
}

if (!is_uploaded_file($file['tmp_name'])) {
    echo "Файл не був завантажений коректно!";
    exit;
}

$allowed = ['png', 'jpg', 'jpeg'];
$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed)) {
    echo "Дозволені тільки зображення (png, jpg, jpeg).";
    exit;
}

if ($file['size'] > 2 * 1024 * 1024) {
    echo "Файл завеликий! Максимум 2 МБ.";
    exit;
}

$targetPath = $uploadDir . $file['name'];

if (file_exists($targetPath)) {
    $base = pathinfo($file['name'], PATHINFO_FILENAME);
    $suffix = "_" . date("Ymd_His");
    $targetPath = $uploadDir . $base . $suffix . "." . $extension;
}

if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    echo "<h3>Файл успішно завантажено!</h3>";
    echo "Ім'я: " . basename($targetPath) . "<br>";
    echo "Тип: " . $file['type'] . "<br>";
    echo "Розмір: " . round($file['size'] / 1024, 2) . " KB<br><br>";

    echo "<a href='$targetPath' download>📥 Завантажити файл</a><br><br>";
    echo "<a href='index.html'>Повернутися назад</a>";
} else {
    echo "Помилка збереження файлу!";
}
