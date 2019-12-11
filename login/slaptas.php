<?php
require 'bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: http://localhost/10/login/login.php');
    die();
}



?>

<h1>SLAPTAS LABAS, <?= $_SESSION['vardas'] ?></h1>
<a href="http://localhost/10/login/login.php?logout=1">atsijungt</a>