<?php

/*11. Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios.
Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų.
Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas yra didesnis nei 30 rūšiavimą kartokite.*/
echo '<b>11. </b>';

// generating 101 elements array with random numbers between 0 - 300
$numberArray = range(0, 300);
shuffle($numberArray);
$numberArray = array_slice($numberArray, 0, 101);

// finding biggest number in number array
$max    = max($numberArray);
$maxKey = array_search($max, $numberArray);
// and deleting it from number array
unset($numberArray[$maxKey]);

$length         = sizeof($numberArray);
$sortedArray    = [];
$middle         = ceil($length / 2);
$part1          = [];
$part2          = [];
sort($numberArray);

foreach ($numberArray as $key => $value) {
    if ($key % 2) $part1[] = $value;
    else $part2[] = $value;
}

for ($i = 0; $i < $middle; $i++) {
    if (abs(array_sum($part2) - array_sum($part1)) < 30) break;

    $tmp        = $part1[$i];
    $part1[$i]  = $part2[$i];
    $part2[$i]  = $tmp;
}

rsort($part2);
$suma           = abs(array_sum($part2) - array_sum($part1));
$sortedArray    = array_merge($part1, [$max], $part2);

// printing sorted array
echo 'Sumų skirtumas (modulis, absoliutus dydis): ' . $suma . '<br>';
foreach ($sortedArray as $item) if ($item == $max) echo " <b>$item</b> ";
else echo " $item";