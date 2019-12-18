<?php

// include 'Miskas.php';
// include 'Kurmis.php';
// include 'Briedis.php';
// include 'kita/Briedis.php';


spl_autoload_register(function ($class) {

    $prefix = 'Vietove\\';
    $base_dir = __DIR__ . '/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    _dc($file);
    if (file_exists($file)) {


        require $file;
    }
});



$zveris = new Vietove\Kurmis;
$lektuvas = new Vietove\Briedis;
$raguotis = new Vietove\Gyvunai\Briedis;
