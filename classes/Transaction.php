<?php
declare(strict_types=1);

namespace classes;

class Transaction {
    const USD_TO_EUR = 0.85;
    const USD_TO_GBP = 0.73;
    const USD_TO_JPY = 110.25;

    public static function convertToEUR($amount) {
        return $amount * self::USD_TO_EUR;
    }

    // Similar methods for other currencies...

    // You can also use class constants in non-static methods
    public function convertToGBP($amount) {
        return $amount * self::USD_TO_GBP;
    }
}

?>