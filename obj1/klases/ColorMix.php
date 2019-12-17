<?php
namespace ColorMixer;

abstract class ColorMix
{
    public static function BlueMix()
    {
        return [rand(1,100), rand(1,100), static::Rotate(30)];
    }

    abstract public static function Rotate(int $d) : int;
}