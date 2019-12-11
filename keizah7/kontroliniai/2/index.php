<?php

// Get the receipt (2 kriaušės ir moliūgas) and show count of loops 

$products       = array('Arbūzas', 'Moliūgas', 'Kriaušė');
$tryIngridient  = true;
$ingridients    = [];
$loops          = 0;

do {
    foreach ($products as $key => $value) {
        $randomNumber       = rand(0, 2);
        $ingridients[$key]  = $products[$randomNumber];
    }
    $count = array_count_values($ingridients);
    $loops++;

    if ((isset($count[$products[1]]) && $count[$products[1]] == 1) && (isset($count[$products[2]]) && $count[$products[2]] == 2)) break;
} while ($tryIngridient);

_dc($products);
echo 'Tinkamą receptą sugeneravo ' . $loops . ' ciklai';
_dc($ingridients);