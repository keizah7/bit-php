<?php
$raides = array_flip(range('A', 'D'));

_dc($raides);

foreach($raides as $key => $val) {
    $raides[$key] = 0;
}


$mas = [];
foreach(range(1,3) as $val) {
    $mas[$val] = array_rand($raides);

    $raides[$mas[$val]] ++;
}

_dc($raides);
_dc($mas);