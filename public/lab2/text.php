<?php

$logFile = "log.txt";

$text = $_POST['text'] ?? '';

if (empty(trim($text))) {
    echo "Текст не може бути порожнім!";
    exit;
}


file_put_contents($logFile, $text . "\n", FILE_APPEND);


$content = file_get_contents($logFile);

echo "<h2>Дані з log.txt:</h2>";
echo nl2br($content);

echo "<br><br><a href='index.html'>Повернутися назад</a>";
