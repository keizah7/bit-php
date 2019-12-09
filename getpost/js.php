<?php

$rawData = file_get_contents("php://input");

$rawData = json_decode($rawData, 1); // gauname 3 skaicius

$atsakymas = ['spalva' => $rawData['color']. '123']; // pridedame savo tris

$atsakymas = json_encode($atsakymas);

echo $atsakymas;


// _d($rawData);