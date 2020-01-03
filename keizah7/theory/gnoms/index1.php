<?php

$busTypes = [
    [
        'max_seats' => 10,
        'g' => [],
        'passengers' => 0,
    ],
];

for ($i = 0; $i < 5; $i++) {
    $stops[$i] = rand(0, 10);
}

// _dc($stops);

$autobusai = [];

$nextBus = true;
$busID = 0;

while (array_sum($stops) > 0) {
    foreach ($stops as $key => $value) {
        _dc($stops);
        echo $key + 1 . ' stotele<br>';

        if ($nextBus) {
            echo 'paleidžiam ' . ($busID + 1) . ' autobusą<br>';
            $currentBus = $busTypes[array_rand($busTypes)];
        } else {
            $currentBus = $autobusai[$busID];
        }

        if ($value <= $currentBus['passengers'] + $value) {
            if ($currentBus['passengers'] + $value > $currentBus['max_seats']) {
                $stops[$key] -= $currentBus['max_seats'] - $currentBus['passengers'];
                $currentBus['passengers'] = $currentBus['max_seats'];

                $autobusai[$busID] = $currentBus;

                $busID++;
                $nextBus = true;

                echo 'visi isedo i sena autobusa ir jis tapo pilnu. Reikia sekancio autobuso';
                echo '<br><br>';

                continue;
            }

            $currentBus['passengers'] += $value;
            $autobusai[$busID] = $currentBus;

            echo 'visi isedo i autobusa';

            if ($currentBus['passengers'] == $currentBus['max_seats']) {
                echo ' ir jis tapo pilnu. Reikia sekancio autobuso';
                $busID++;
                $nextBus = true;
            } else {
                echo ', bet jis dar nepilnas';
                $nextBus = false;
                $busID = count($autobusai) - 1;
            }
            echo '<br><br>';


            $stops[$key] = 0;

            // var_dump($nextBus);
            continue;
        } else {
            echo 'nezinau ka daryti';
        }
    }
}


// _dc($stops);
_dc($autobusai);
