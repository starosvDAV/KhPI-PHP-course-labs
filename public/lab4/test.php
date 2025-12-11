<?php

require_once "Product.php";
require_once "DiscountedProduct.php";
require_once "Category.php";


try {
    $p1 = new Product("Ноутбук Lenovo", 25000, "14 дюймів, 16GB RAM");
    $p2 = new Product("Мишка Logitech", 800, "Бездротова, оптична");

    $dp1 = new DiscountedProduct("Клавіатура HyperX", 1800, "RGB підсвітка", 15);
    $dp2 = new DiscountedProduct("Монітор Samsung", 7200, "24 дюйми, IPS", 10);

} catch (Exception $e) {
    echo "<strong>Помилка:</strong> " . $e->getMessage();
    exit;
}


$cat1 = new Category("Комп'ютери та периферія");
$cat2 = new Category("Монітори");


$cat1->addProduct($p1);
$cat1->addProduct($p2);
$cat1->addProduct($dp1);

$cat2->addProduct($dp2);


$cat1->showProducts();
echo "<hr>";
$cat2->showProducts();
