<?php

define('KONSTANTA', 42);

var_dump(
    defined('KONSTANTA11')
);

$kintamasis = 64;


echo KONSTANTA;
echo '<br>';


$ro = 34;

echo $ro;
echo '<br>';
echo '<br>';

$ff = &$ro;

function Bra(&$param)
{
    $param = $param * 23;
    echo '<br>';
    echo 'Funkcija';
    echo '<br>';
}

Bra($ro);

echo $ro;
echo '<br>';
echo '<br>';

$ff++;
echo $ro;
echo '<br>';
echo '<br>';







function Abra($zz, ...$bb)
{
    global $kintamasis;
    echo KONSTANTA;
    // echo '<br>';
    // echo '<br>';
    // echo $kintamasis;
    echo '<br>';
    echo '<br>';
    echo $zz;
    // echo '<br>';
    // echo '<br>';
    _dc($bb);
}


Abra(55, 565, 56565, 56565, 5656564948645);

echo '<br>';    echo '<br>';    echo '<br>';    echo '<br>';




$masyvas = ['vienas', 'du', 'trys', 'keturi'];

foreach($masyvas as &$val){}



unset($val);

foreach($masyvas as $val){
$val = 77;
    echo $val;
    echo '<br>';
}

_dc($masyvas);


$generator = function() {
    echo 'OOO';
    for ($i = 1; $i <= 3; $i++) {
        echo 'OOO';
        // Note that $i is preserved between yields.
        yield $i;
    }
};

// $generator = gen_one_to_three();

 $generator();

foreach ($generator as $value) {
    echo "$value<br>";
}

$message = 'LOLO';

$f = function ($match) use (&$message) {
    return $match[0].'__'.$message;
};


$message = 'LOLOUUUUU';

echo 
preg_replace_callback('/[0-9]+/', $f, 'hello77world');



echo '<br>';
// echo  md5(time());


echo preg_replace_callback('/[0-9]+/', function($m){
    return '<h1 style="display:inline;">'.$m[0].'</h1>';
}, md5(time()));


