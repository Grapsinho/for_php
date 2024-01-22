<?php

namespace classes;

class Student
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function learn()
    {
        echo "$this->name: Learning\n";
    }
}