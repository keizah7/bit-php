<?php


$_0 = 'Arbūzas';
$_1 = 'Moliūgas';
$_2 = 'Kriaušė';

$count = 0;
do {
$receptas = '';
$count++;
    foreach(range(1,3) as $val) {
        $sugeneruotas = '_'. rand(0,2);
        $receptas .= $$sugeneruotas. ' ';
    }
 echo $receptas. '<br>';   


} while((substr_count($receptas, 'Kr') !== 2) || (substr_count($receptas, 'Mo') !== 1));

echo '<br> Ciklų: '. $count;