<?php


$stringas = 'ADS 786 skjldhf sdkjfhsd sd AHS 897 alshdsah ASU 777';

preg_match_all('/([A-Z]{3}) ([0-9]{3})/', $stringas, $match);


_d($match);
_dc($match);
