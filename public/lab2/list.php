<?php

$dir = "uploads/";

$files = scandir($dir);

echo "<h2>Список файлів у uploads:</h2>";

foreach ($files as $file) {
    if ($file === "." || $file === "..") continue;

    echo "<a href='uploads/$file' download>$file</a><br>";
}

echo "<br><a href='index.html'>Повернутися назад</a>";
