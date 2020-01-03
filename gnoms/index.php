<?php

require 'Bus.php';
require 'Stop.php';


$stops = [];
foreach (range(1, 5) as $index) {
    $stops[$index] = new Stop;
}

while(Stop::getAllGnoms()) {
    $bus = Bus::getBus();

    foreach ($stops as $stop) {
        $stop->busArrived($bus);
    }

}

_dc($stops);
_dc(Bus::$allBuses);