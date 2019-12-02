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



