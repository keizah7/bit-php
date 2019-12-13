<?php

session_start();
require 'functions.php';
require 'actions.php';

define('PARTS', '_partials/'); // _partials directory
define('DEFAULT_PATH', '.');

$users              = [
    'admin' => '$2y$10$WhXSJoLJy8gMXtp4YBz2hOjlCbU3c2FyFmhXJYc8xmU.oYa/B4d.q'
];
$directory          = isset($_GET['directory']) ? decodeParameter($_GET['directory']) : ['directory' => DEFAULT_PATH];
$currentDirectory   = is_dir($directory['directory']) ? $directory['directory']: DEFAULT_PATH;
$files              = createDirTreeFrom($currentDirectory);
$breadcrumb         = $directory['directory'] . DIRECTORY_SEPARATOR;
$url                = $_SERVER['PHP_SELF'] . '?' . (strlen($_SERVER['QUERY_STRING']) > 0 ? $_SERVER['QUERY_STRING'] . '&' : '');