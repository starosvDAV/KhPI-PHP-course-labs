<?php

class Category
{
    public $categoryName;
    public $products = [];

    public function __construct($name)
    {
        $this->categoryName = $name;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function showProducts()
    {
        echo "<h3>Категорія: {$this->categoryName}</h3>";

        if (empty($this->products)) {
            echo "Немає товарів у цій категорії.<br>";
            return;
        }

        foreach ($this->products as $product) {
            echo $product->getInfo();
        }
    }
}
