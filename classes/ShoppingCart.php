<?php

namespace classes;

class ShoppingCart {
    public int $quantity;
    private static $productArray = [];

    public function addItem(Product $product, $quantity) {
        self::$productArray[$product->get_name()][] = [$product, $quantity];
    }

    public function removeItem(Product $product) {
        $productArray2 = self::$productArray;
        $lenArr = count($productArray2);
        if ($lenArr === 0) {
            die("The shopping cart is empty");
        } else {
            unset(self::$productArray[$product->get_name()]);
        }
    }

    public function displayCart() {
        if (empty(self::$productArray)) {
            echo "\nYour shopping cart is empty.\n\n";
        } else {
            echo "\nShopping Cart:\n";
            foreach (self::$productArray as $key => $value) {

                foreach ($value as $values) {
                    echo $values[0]->productInfo($values[1]);
                    echo "Quantity: ".$values[1]."\n";
                    echo "\n";
                }
            }
        }
    }
}