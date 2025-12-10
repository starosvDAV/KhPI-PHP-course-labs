<?php

echo "Hello, World!<br>";


$string = "PHP";
$integer = 42;
$float = 3.14;
$boolean = true;


echo "<h3>Змінні:</h3>";
echo "Рядок: $string<br>";
echo "Ціле число: $integer<br>";
echo "Дійсне число: $float<br>";
echo "Булеве значення: " . ($boolean ? 'true' : 'false') . "<br>";


echo "<h3>Типи змінних:</h3>";
var_dump($string);
echo "<br>";
var_dump($integer);
echo "<br>";
var_dump($float);
echo "<br>";
var_dump($boolean);
echo "<br><br>";


$firstName = "Давід";
$lastName = "Старосвітський";
$fullName = $firstName . " " . $lastName; // об’єднання рядків
echo "<h3>Конкатенація рядків:</h3>";
echo "Повне ім’я: $fullName<br><br>";


$number = 7;
echo "<h3>Умовна конструкція:</h3>";
if ($number % 2 == 0) {
    echo "Число $number — парне.<br>";
} else {
    echo "Число $number — непарне.<br>";
}


echo "<h3>Цикл for (1 до 10):</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i ";
}

echo "<br><h3>Цикл while (10 до 1):</h3>";
$j = 10;
while ($j >= 1) {
    echo "$j ";
    $j--;
}

echo "<br><br>";


echo "<h3>Асоціативний масив студента:</h3>";
$student = [
    "ім'я" => "Давід",
    "прізвище" => "Старосвітський",
    "вік" => 20,
    "спеціальність" => "Комп'ютерні науки"
];


foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}


$student["середній_бал"] = 92.5;

echo "<h4>Оновлений масив:</h4>";
echo "<pre>";
print_r($student);
echo "</pre>";
?>
