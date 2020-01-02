<?php

require 'Grybas.php';
require 'Krepsys.php';


$krepsys = new Krepsys;
// $rasta_grybu = 0;

// while( !$krepsys->isFull() ) {
//     $rasta_grybu++;
//     $krepsys->add(new Grybas);
// }

while( !$krepsys->add(new Grybas)->isFull() ) {}





// _dc($rasta_grybu);
_dc($krepsys);
