<?php
session_start();
if (!isset($_SESSION['stops']) || array_sum($_SESSION['stops']) == 0) {
    $stops = [];
    foreach (range(1,5) as $index) {
        $stops[$index] = rand(0, 10);
    }
    $_SESSION['stops'] = $stops;
    $new = true;
    $_SESSION['busCount'] = 0;
    $_SESSION['inbus'] = 0;
}

$busCount = $_SESSION['busCount'];


if (!isset($new)) {

    $b = [
        5,
        15,
        25
    ];

    $stops = $_SESSION['stops'];
    // $busType = $b[rand(0,2)];
    $busType = 5;
    $inBus = $_SESSION['inbus'] ?? 0;
    


$stopBreak = false;
while (array_sum($stops) > 0) {
    foreach ($stops as $index => $stop) {
        while ($stops[$index] > 0) {
            $stopBreak = true;
            $stops[$index]--;
            $inBus++;
            $displayinBus = $inBus;
            if ($inBus == $busType) {
                $busCount++;
                $inBus = 0;
                break 3;
            }
        }
        if ($stopBreak) {
            break 2;
        }
        
    }
    $busCount++;
}


    $_SESSION['stops'] = $stops;
    $_SESSION['busCount'] = $busCount;
    $_SESSION['inbus'] = $inBus; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="1">
    <title>GNOMS</title>
</head>
<body>

    

<h1>BUSES:<?=  $busCount ?></h1>
<h1>IN BUS NOW:<?=  $displayinBus ?? 0 ?></h1>


<div class="stops">
<?php

foreach ($stops as $stop) {
    ?>
    <span class="stop" style="display:inline-block;width:50px;height:50px;border:2px solid blue;border-radius:50%;margin:30px;padding:30px;font-size:30px;line-height:50px;text-align:center;">
    <?= $stop ?>
    </span>
    <?php
}


?>
</div>
</body>
</html>
<?php


// _dc($stops);