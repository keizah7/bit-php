<?php
/*11. Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais.
Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs).
Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.*/
echo '<b>11. </b><br>';

$numberArray = range(1, 200);
shuffle($numberArray);
$numbers = array_slice($numberArray, 0, 50);

echo implode(' ', $numbers); // print random 50 numbers between 1 - 200

$numbers = array_map('primeNumber', $numbers);
sort($numbers);
echo '<br>' . implode(' ', $numbers); // print random 50 numbers between 1 - 200, which is prime

/**
 * Check if number is prime
 *
 * @param int $value
 * @return int
 */
function primeNumber($value)
{
    $dividers = 0;
    for ($i = 1; $i <= $value; $i++) if ($value % $i == 0) $dividers++;
    if ($dividers < 3 && $value > 1) return $value;
}
