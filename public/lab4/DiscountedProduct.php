<?php

require_once "Product.php";

class DiscountedProduct extends Product
{
    public $discount; // у %

    public function __construct($name, $price, $description, $discount)
    {
        parent::__construct($name, $price, $description);

        if ($discount < 0 || $discount > 100) {
            throw new Exception("Знижка повинна бути в діапазоні 0–100%");
        }

        $this->discount = $discount;
    }

    public function getDiscountedPrice()
    {
        return $this->price - ($this->price * ($this->discount / 100));
    }

    public function getInfo()
    {
        $newPrice = $this->getDiscountedPrice();

        return "
            <strong>Назва:</strong> {$this->name}<br>
            <strong>Ціна:</strong> {$this->price} грн<br>
            <strong>Знижка:</strong> {$this->discount}%<br>
            <strong>Нова ціна:</strong> {$newPrice} грн<br>
            <strong>Опис:</strong> {$this->description}<br><br>
        ";
    }
}
