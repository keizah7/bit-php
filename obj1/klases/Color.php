<?php
namespace ColorMixer;

interface Color
{
    function BlueMix();

    // function RedMix();

    function Rotate(int $d) : int;
}