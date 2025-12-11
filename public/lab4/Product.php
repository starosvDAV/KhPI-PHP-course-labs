<?php

class Product
{
    public $name;
    protected $price;
    public $description;

    public function __construct($name, $price, $description)
    {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною!");
        }

        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getInfo()
    {
        return "
            <strong>Назва:</strong> {$this->name}<br>
            <strong>Ціна:</strong> {$this->price} грн<br>
            <strong>Опис:</strong> {$this->description}<br><br>
        ";
    }
}
