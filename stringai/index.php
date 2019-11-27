<?php

echo md5('111111111');
echo '<br>';
echo md5('111111112');
echo '<br>';
echo ord ('1');
echo '<br>';

foreach(range(1,30) as $val) {
    echo chr(rand(1,2));
}

$stringas = 'Kiaule ir Briedis';


echo '<br>';
foreach( range(0,strlen($stringas)-1) as $val ) {
    echo $stringas{$val};
    echo '<br>';
}

echo '<br>';echo '<br>';

echo substr(str_shuffle(str_repeat(implode('', range('a','z')),10)),0, 30);






