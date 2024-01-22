<?php

namespace classes;

class Product {
    private string $name;
    private float $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function productInfo($quantity) {
        $price = $this->price * $quantity;
        echo "Product Name: $this->name \n";
        echo "Product Price: $price \n";
    }

    public function get_name() {
        return $this->name;
    }
}