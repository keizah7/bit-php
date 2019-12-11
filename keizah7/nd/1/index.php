<?php

/* 10. Padarykite skaitmeninį laikrodį, rodantį valandas, minutes ir sekundes.
Valandom, minutėm ir sekundėm sugeneruoti panaudokite funkciją rand().
Sugeneruokite skaičių nuo 0 iki 300. Tai papildomos sekundės. Skaičių pridėkite prie jau sugeneruoto laiko.
Atspausdinkite laikrodį prieš ir po sekundžių pridėjimo ir pridedamų sekundžių skaičių. */
echo '<b>10. </b>';

$seconds    = rand(0, 60*60*23);
$s          = rand(0, 30);

printTime($seconds);
echo " + $s s. = ";
printTime($seconds + $s);

/**
 * Prints time in hh:mm:ss format
 *
 * @param int $time
 * @return void
 */
function printTime($time){
    $hours      = floor($time / 3600);
    $minutes    = floor(($time - ($hours * 3600)) / 60);
    $seconds    = floor(($time - ($hours * 3600)) - ($minutes * 60));
    $colon      = ':';

    echo numberFormat($hours) . $colon . numberFormat($minutes) . $colon . numberFormat($seconds);
}

/**
 * Returns number format
 *
 * @param int $number
 * @return string|int
 */
function numberFormat($number){
    if($number < 10) return '0'.$number;
    else return $number;
}

/* 11. Naudokite funkcija rand(). Sugeneruokite 6 kintamuosius su atsitiktinem reikšmėm nuo 1000 iki 9999.
Atspausdinkite reikšmes viename strige, išrūšiuotas nuo didžiausios iki mažiausios, atskirtas tarpais.
Naudoti ciklų ir masyvų NEGALIMA. */
echo '<br><b>11. </b>';

$one    = randomNumber();
$two    = randomNumber();
$three  = randomNumber();
$four   = randomNumber();
$five   = randomNumber();
$six    = randomNumber();

sortNumbers();

echo "$first $second $third $fourth $fith $sixth";

/**
 * Generates random number
 *
 * @return int
 */
function randomNumber() {
    $min = 1000;
    $max = 9999;

    return rand($min, $max);
}

/**
 * Counts $number place and then assign it to place variable
 *
 * @param int $number
 * @return void
 */
function sortNumber($number){
    global $one, $two, $three, $four, $five, $six, $first, $second, $third, $fourth, $fith, $sixth;
    $place = 6;

    if($number > $one) $place--;
    if($number > $two) $place--;
    if($number > $three) $place--;
    if($number > $four) $place--;
    if($number > $five) $place--;
    if($number > $six) $place--;

    if($place == 1) $first = $number;
    if($place == 2) $second = $number;
    if($place == 3) $third = $number;
    if($place == 4) $fourth = $number;
    if($place == 5) $fith = $number;
    if($place == 6) $sixth = $number;
}

/**
 * Call sortNumber functions with all variables
 *
 * @return void
 */
function sortNumbers(){
    global $one, $two, $three, $four, $five, $six;

    sortNumber($one);
    sortNumber($two);
    sortNumber($three);
    sortNumber($four);
    sortNumber($five);
    sortNumber($six);
}