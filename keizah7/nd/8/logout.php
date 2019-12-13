<?php

session_start();

if (isset($_SESSION['logged'])) {
    session_destroy();
    header('Location: index.php');
    die();
}