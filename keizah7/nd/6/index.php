<style>
    div {
        padding: 1em;
        border: 1px solid;
        display: inline-block;
    }
</style>

<?php

/* 11. Sugeneruokite masyvą, kurio ilgis atsitiktinai kinta nuo 10 iki 100. Masyvo reikšmės yra: nuo 50% iki 100% atsitiktiniai skaičiai 0-100, o likusios masyvai.
Šitų masyvų reikšmės analogiškos (nuo 50% iki 100% atsitiktiniai skaičiai 0-100, o likusios masyvai) ir t.t. kol visos galutinės reikšmės bus skaičiai ne masyvai.
Suskaičiuoti kiek elementų turi masyvas. Suskaičiuoti masyvo elementų (tie kurie ne masyvai) sumą.
Suskaičiuoti maksimalų masyvo gylį. Atvaizduokite masyvą grafiškai.
Masyvą pavazduokite kaip div elementą, kurio viduje yra skaičiai.
Kiekvienas div elementas turi savo unikalų id ir unikalią background spalvą (spalva pvz nepavaizduota).
pvz: 
<div id=”M1”>
10, 46, 67, 
<div id=”M2”> 89, 45, 89, 34, 90, 
<div id=”M3”> 84, 97 </div>
90, 56 </div> 
</div> */

define('PROC', 70); // skaičių tikimybė %
$array          = [];
$arrayLength    = rand(1, 100); // pradinio masyvo ilgis
$count          = 0;
$suma           = 0;

for ($i = 0; $i < $arrayLength; $i++) $array[] = getArrayValue();

// $array = [10, 46, 67, [
//     89, 45, 89, 34, 90, [
//         84, 97
//     ], 90, 56
// ]]; // default array

_dc($array);

printArray($array);
echo "<br>Masyvo elementų suma yra $suma";
echo '<br>Maksimalų masyvo gylis yra ' . countArrayDepth($array);

/**
 * Creates random elements array
 *
 * @return array
 */
function getArrayValue() {
    if (rand(0, 100) < PROC) return rand(0, 100);
    else {
        $arrayLength    = rand(1, 5); // vidino masyvų ilgis
        $array          = [];

        for ($i = 0; $i < $arrayLength; $i++) $array[$i] = getArrayValue();
        return $array;
    }
}

/**
 * Prints array structure with div boxes
 *
 * @param array $array
 * @return void
 */
function printArray($array) {
    global $count, $suma;
    $count++;
    $bg = substr(md5(rand()), 0, 6);

    echo '<div style="background-color: #' . $bg . ';" id=”M' . $count . '">';

    foreach ($array as $value) {
        if (is_array($value)) printArray($value);
        else {
            echo " $value ";
            $suma += $value;
        }
    }

    echo '</div>';
}

/**
 * Counts given array max depth
 *
 * @param array $array
 * @return int
 */
function countArrayDepth($array) {
    $max = 1;

    foreach ($array as $value) {
        if (is_array($value)) {
            $depth = countArrayDepth($value) + 1;

            if ($depth > $max) $max = $depth;
        }
    }

    return $max;
}