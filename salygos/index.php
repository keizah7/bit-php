<?php

//Vieno kintamojo sąlyga 
$drambliai= 0; 
if ($drambliai) {
    echo 'Yra drambliu';
}
echo 'Yra begemotu';

// be skliaustu - nelabai grerai
$drambliai= 0; 
if ($drambliai)
echo 'Yra drambliu';
echo 'Yra begemotu';

echo '<br><br><br><br>';

$drambliai= 14; 
if ($drambliai <= 10) {
    echo 'Yra drambliu';
}
elseif ($drambliai > 10) {
    echo 'Drabliu banda';
}
else {
    echo 'Nera drambliu'; 
}

// Jonas ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, Jonas 
// surenka taškų kiekį nuo 5 iki 25. Išvesti žaidėjų vardus su taškų kiekiu ir 
// “Laimėjo: ​laimėtojo vardas​”; 
// Taškų kiekį generuokite funkcija ​rand()​; 


echo '<br><br><br><br>';

$jonas = rand(10, 20);
$petras = rand(5, 25);

echo "REzulTatai: Jonas:$jonas Petras:$petras<br>";

if ($jonas > $petras) {
    echo 'laimejo Jonas';
}
elseif ($jonas < $petras) {
    echo 'laimejo Petras';
}
else {
    echo 'lygiosios';
}

echo '<br><br><br><br>';

$A = (true) ? 1 : (false) ? 2 : 3;

echo $A;

echo '<br><br><br><br>';

$vienas = 'blabla';

$A = $vienas ?? 89;

echo $A;