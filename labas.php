<?php

$pirmas = rand(0,4);
$antras = rand(0,4);

if ($pirmas > $antras) {
    $atsakymas = $pirmas/$antras;
}
else {
    $atsakymas = $antras/$pirmas;
}

echo '<pre>';
echo $atsakymas;