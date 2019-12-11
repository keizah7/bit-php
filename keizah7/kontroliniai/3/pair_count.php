<?php

// count pairs in md5(time());

$a      = md5(time());
$pairs  = 0;

echo $a;
echo '<br>';
for ($i=0; $i < strlen($a); $i++) {
    if(isset($a{$i+1})) {
        if($a{$i} === $a{$i+1}) {
            $pairs++;
            $i++;
        }
    }
}

echo '<br>Porų: '. $pairs;