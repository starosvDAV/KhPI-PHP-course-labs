<?php
$cacheFile = __DIR__ . '/cache/report.html';
$cacheTime = 600; // 10 хвилин

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {

    echo file_get_contents($cacheFile);
    echo "<p><em>Дані з кешу файлу</em></p>";
} else {

    sleep(3);

    $html = "<table border='1'><tr><th>№</th><th>Ім'я</th><th>Сума</th><th>Дата</th></tr>";
    for ($i = 1; $i <= 1000; $i++) {
        $html .= "<tr>
                    <td>$i</td>
                    <td>Ім'я$i</td>
                    <td>" . rand(100, 1000) . "</td>
                    <td>" . date('Y-m-d', strtotime("+$i days")) . "</td>
                  </tr>";
    }
    $html .= "</table>";


    if (!is_dir(__DIR__ . '/cache')) {
        mkdir(__DIR__ . '/cache', 0777, true);
    }
    file_put_contents($cacheFile, $html);

    echo $html;
    echo "<p><em>Дані згенеровані і збережені у кеш</em></p>";
}
