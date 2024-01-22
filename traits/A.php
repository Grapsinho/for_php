<?php

namespace traits;

trait A {
    public $a = 'Giorgi';

    public function sayHello() {
        echo "Hello from A $this->a\n";
    }
}