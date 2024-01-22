<?php
namespace classes;

class Teacher
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function teach()
    {
        echo "$this->name: Teaching\n";
    }
}