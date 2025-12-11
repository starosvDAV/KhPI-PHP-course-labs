<?php

require_once "BankAccount.php";
require_once "SavingsAccount.php";

echo "<h2>Тестування банківських рахунків</h2>";

try {

    $acc1 = new BankAccount("USD", 100);
    echo "Створено рахунок 1. Баланс: " . $acc1->getBalance() . "<br>";


    $acc1->deposit(50);
    echo "Після поповнення +50: " . $acc1->getBalance() . "<br>";


    $acc1->withdraw(120);
    echo "Після зняття -120: " . $acc1->getBalance() . "<br>";



} catch (Exception $e) {
    echo "<strong>Помилка: </strong>" . $e->getMessage() . "<br>";
}

echo "<hr>";

try {

    $saveAcc = new SavingsAccount("EUR", 200);
    echo "Створено накопичувальний рахунок. Баланс: " . $saveAcc->getBalance() . "<br>";

    $saveAcc->deposit(100);
    echo "Після поповнення +100: " . $saveAcc->getBalance() . "<br>";


    $saveAcc->applyInterest();
    echo "Після нарахування відсотків (" . SavingsAccount::$interestRate . "%): " . $saveAcc->getBalance() . "<br>";



} catch (Exception $e) {
    echo "<strong>Помилка: </strong>" . $e->getMessage() . "<br>";
}

echo "<hr>";

echo "<h3>Тест завершено.</h3>";
