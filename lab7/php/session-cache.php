<?php
session_start();

function generateData() {
    sleep(2);
    return [
        'usd' => rand(35, 46),
        'eur' => rand(38, 43)
    ];
}

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];
    if ($age < 600) {
        $data = $_SESSION['cached_data'];
        $source = 'з кешу сесії';
    } else {
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = 'оновлено кеш';
    }
} else {
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'створено новий кеш';
}

echo "<p>Дані: " . json_encode($data) . "</p>";
echo "<p>Джерело: $source</p>";
