<?php

$masyvas = [];
$masyvas['kojinės'] = [];
$masyvas['kojinės']['zalios'] = 'visos žalios kojinės';
$masyvas['kojinės']['juodos'] = 'visos juodos kojinės';
$masyvas['kojinės']['margos'] = 'visos margos kojinės';
$masyvas['pirstines'] = [];
$masyvas['pirstines']['kailines'] = 'mano kailinės pirštinės';
$masyvas['pirstines']['odines'] = 'mano odinės pirštinės';
$masyvas['nosines'] = 'visos mano nosinės';


_dc($masyvas);


foreach($masyvas as $key => $value) {
    
    if (is_array($value)) {
        foreach($value as $key1 => $value1) {

            echo "$key => $key1 => $value1 <br>";
        }
    }
    else {
        echo "$key => $value <br>";
    }
    

}

// $mas = range(1, 200);

$mas = array_fill(1, 200, '');

// $m = [];
// foreach($mas as $val) {
//     $m[] = rand(1,7);
// }


array_map(
    function($k1, $k2){
        global $mas; $mas[$k1] = rand(1, 77);
    },
 array_keys($mas), $mas);


$mas = [];
$c = 0;
foreach(range(10,12) as $val_d) {

    foreach(range(1,3) as $val_m) {

        $mas[$val_d][$val_m] = ++$c;
    
    }

}

_dc($mas);


$mas = [];
$c = 0;
foreach(range(1,3) as $val_m) {

    foreach(range(10,12) as $val_d) {

        $mas[$val_d][$val_m] = ++$c;
    
    }

}

_dc($mas);

$mas = [];
$c = 0;
foreach(range(1,3) as $val_m) {

    foreach(range(100,102) as $val_d) {

        foreach(range(10,12) as $val_v) {

            $mas[$val_d][$val_v][$val_m] = ++$c;
        
        }

    }

}

_dc($mas);


foreach(range(1,rand(3,9)) as $val_m) {

    foreach(range(100,rand(102,120)) as $val_d) {

        foreach(range(10,rand(12,20)) as $val_v) {

            $mas[$val_d][$val_v][$val_m] = ++$c;
        
        }

    }

}

_dc($mas);







