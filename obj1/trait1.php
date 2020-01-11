<?php

trait PropertiesTrait
{
    static public $x = 100;
}

trait PropertiesTrait1
{
    static public $x = 200;
}

class PropertiesExample
{
    use PropertiesTrait, PropertiesTrait1 {
        PropertiesTrait::d insteadof PropertiesTrait1;
    }
}

$example = new PropertiesExample;
echo PropertiesExample::$x;
