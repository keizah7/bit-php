<?php
namespace ColorMixer;

trait Red
{
    public static function RedMix()
    {
        return [rand(1,100), rand(1,100), static::Rotate(30)];
    }
}