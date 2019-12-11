<?php

// After f5 make body background random (red, blue, black)

$colors         = ['red', 'blue', 'black'];
$randomColor    = array_rand($colors);

echo '<body style="background:'.$colors[$randomColor].';"></body>';