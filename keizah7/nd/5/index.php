<?php

// Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.

// foreach (range(0, 9) as $value) {
//     foreach (range(0, 4) as $kid) {
//         $array[$value][] = rand(5, 25);
//     }
// }

// _dd($array);


/*************************************** */
// 11. Duotas kodas, generuojantis masyvą:
do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);

$long   = rand(10, 30);
$sk1    = $sk2 = 0;
$c      = [];
$suma   = 0;

for ($i = 0; $i < $long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
    $suma += $c[$i];
}

echo '<h3>Skaičiai ' . $a . ' ir ' . $b . '</h3>';
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';
/*Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
NEGALIMA! naudoti jokių regex ir string funkcijų.
GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.

Atsakymą reikia pateikti formatu:
echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';*/
echo '<b>11. </b><br>';
/***************************************************************************************************************************************** */
$i          = $long; // iteratorius
$min        = min($c); // minimalus skaicius is masyvo
$max        = max($c); // maksimalus skaicius is masyvo

$likuciai   = array_map('divisionByMin', $c); // likuciu masyvas
// _dc($likuciai);
$lmin       = min($likuciai); // likuciu minimalus skaicius (1)
$lmax       = max($likuciai); // likuciu maximalus skaicius
$lSuma      = array_sum($likuciai); // likuciu suma

$maxKiekis  = ($lSuma - $i) / ($lmax - $lmin); // skaiciuojamas didziausio skaiciaus kiekis // kadangi minimalaus skaiciaus suma lygi 1 * kartai
$k1         = $i - $maxKiekis;
$k2         = $maxKiekis;

/**
 * Divides array value by min value of $c array
 *
 * @param int $value
 * @return float
 */
function divisionByMin($value) {
    global $min;
    return $value / $min;
}

if ($a > $b) echo '<h3>Skaičius ' . $a . ' yra pakartotas ' . $k2 . ' kartų, o ' . $b . ' - ' . $k1 . ' kartų.</h3>';
else echo '<h3>Skaičius ' . $a . ' yra pakartotas ' . $k1 . ' kartų, o ' . $b . ' - ' . $k2 . ' kartų.</h3>';

// $sk1 = ($suma - $b * $i) / ($a - $b);
// $sk2 = $i - $sk1;

// echo "<h3>Skaičius $a yra pakartotas $sk1 kartų, o $b - $sk2 kartų.</h3>";



// 1. Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.

$array = [];
$biggerThanTen = 0;
$max = 0;

foreach (range(1, 10) as $key => $value) {
    foreach(range(1, 5) as $i => $number) {
        $random = rand(5, 25);
        $array[$key][] = $random;
        if($random > 10) $biggerThanTen++;
        if($random > $max) $max = $random;
    }
} // 1.

/* 2. Naudodamiesi 1 uždavinio masyvu:
    a. Suskaičiuokite kiek masyve yra elementų didesnių už 10;
    b. Raskite didžiausio elemento reikšmę;
    c. Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)
    d. Visus masyvus “pailginkite” iki 7 elementų
    e. Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą.
    T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai  */

// _dc($array);
echo $biggerThanTen;