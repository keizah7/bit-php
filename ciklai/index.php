<?php

$sk = rand(0, 10);

do {
    echo $sk . '<br>';
    $sk = rand(0, 10);
 } while ($sk < 9);
 echo '<br><br><br><br>';
while ($sk < 9) {
   echo $sk . '<br>';
   $sk = rand(0, 10);
}
echo '<br><br><br><br>';


for ($x = 1; $x <= 5; $x++) {
    echo 'Numeris: '.$x.' <br>';
}
echo '<br>';
foreach(range(1,5) as $val) {
    if($val%2)continue;
    echo 'Numeris: '.$val.' <br>';
}
echo '<br><br><br><br>';
for ($a = 1; $a <= 5; $a++) {
    echo '<b>Didžiojo ciklo Numeris: '.$a.' </b><br>';
    for ($x = 1; $x <= 5; $x++) {
        echo 'Mažojo Ciklo Numeris: '.$x.' <br>';
    }
 }
 
 

