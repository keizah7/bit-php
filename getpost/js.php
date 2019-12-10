<?php

$rawData = file_get_contents("php://input");

_d($rawData);

$rawData = json_decode($rawData, 1); // gauname 3 skaicius

_d($rawData, 'decodintas');

$atsakymas = [
    'spalva' => $rawData['color']. '123',
    'html' => '<h2>Spalvotas Fonas 1</h2>'.time()
]; // pridedame savo tris

_d($atsakymas, 'atsakymas');

$atsakymas = json_encode($atsakymas);

_d($atsakymas, 'stringas');

// sleep(4);

echo $atsakymas;


// _d($rawData);