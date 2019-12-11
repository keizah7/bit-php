<?php

$re = '/([1-9]{1}[0-9]{3})\-((0[0-9]{1}|1[0-2]{1})\-([0-1]{1}[0-9]{1}|2[0-8]{1})|(02\-([0-1]{1}[0-9]{1}|2[0-8]{1})))/';
$str = '1974-02-28';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
// print_r($matches);
// echo '<br>';echo '<br>';echo '<br>';
preg_match($re, $str, $matches);
_d($matches);