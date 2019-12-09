<h1>Kaciukai ir suniukai ir Meskos</h1>


<?php

$f = 'Kalakutas';

echo "5.4 Briedziai $f \n" . '7.4 Sernai 10<br>';


echo mb_strlen('KalaŽ');

echo '<br>';


echo $f{3};

echo '<br>';

var_dump(strpos($f, 'K'));




$a = md5(time()); ///////be regekso

// $a = 'aaaaddaaa';

$now = false;
$count = 0;
foreach(range(0, strlen($a)-1) as $val) {
    if ($now === $a{$val}) {
        $count++;
        $now = false;
    }
    else {
        $now = $a{$val};
    }
}

echo $count;



// ziaurEI paprastas

$a = md5(time()); ///////be regekso


// masyve "a" raides pakeisti i "Z"


echo '<br>';

$d = function(){return rand(1,99).'BB';};

echo str_repeat($d(), 6);









?>

<h3>Viskas</h3>