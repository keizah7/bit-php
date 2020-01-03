<?php

require 'Bus.php';
require 'Stop.php';
require 'Passenger.php';

foreach (range(1, 5) as $value) {
    $stops[$value] = new Stop;
}

_dc($stops);

while (Stop::getAllPassengers()) {
    $bus = Bus::getBus();

    foreach ($stops as $stop) {
        $stop->busArrived($bus);
    }
}

echo '<br><br><br><br><br><br>';
_dc(Bus::$allBuses);
