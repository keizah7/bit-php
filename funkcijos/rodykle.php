<?php

$kintamasis = 64;

$k1 = &$kintamasis; // antras kintamojo vardas

$k2 = ['lopas', 'nelopas', 'kazkas'];

$k2[2] = &$kintamasis;

_dc($kintamasis);
$k1 = 89;
_dc($kintamasis);
_dc($k2);
// $k2[2] = 777;
// $k2[1] = 888;
// _dc($kintamasis);
$kintamasis = 90;
_dc($k2);



// $masyvas = ['vienas', 'du', 'trys', 'keturi'];

// foreach($masyvas as &$val){}

// // 1 ciklas $val = &$masyvas[0]

// foreach($masyvas as $val){

// }

// 1 ciklas $val = $masyvas[0] => $masyvas[3] = $masyvas[0]

$masyvas2 = ['vienas', 'du', 'trys', 'keturi'];

foreach($masyvas2 as $key => $val) {

    $masyvas2[$key] = '__'.$val;

    // $val =  '__'.$val;

}

_dc($val);

_dc($masyvas2);

foreach($masyvas2 as &$val) {

    $val =  '__'.$val;

}

_dc($masyvas2);


$a = 88;

function plus($b)
{
    $b++;

    // return 'CCC';
}

_dc($a);

$s = plus($a);

var_dump($s);

_dc($a);

 $d = null;

// echo $d;

var_dump(isset($d));
 var_dump($d === null);

