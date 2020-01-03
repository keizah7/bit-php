<?php
require 'Passenger.php';
require 'Bus.php';
require 'Stop.php';


$stops = [];
foreach (range(1, 5) as $index) {
    $stops[$index] = new Stop;
}


while(Stop::getAllPassengers()) {
    $bus = Bus::getBus();
    var_dump($bus);
    _dc($stops);

    

    foreach ($stops as $stop) {
        $stop->busArrived($bus);
    }

}


_dc(Bus::$allBuses);