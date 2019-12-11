<?php

/*Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų.
Žodžiai neturi kartotis. (reikės masyvo)*/
echo '<b>11. </b>';

$text   = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood" . ' Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';
$text   = str_replace(',', '', $text);
$words  = explode(' ', $text);
$string = '';

foreach (array_rand($words, 10) as $word) $string .= ' ' . $words[$word];

echo $string;