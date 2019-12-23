<?php

/* 1. Sukurti klasę Piniginė. Sukurti dvi privačias savybes popieriniaiPinigai ir metaliniaiPinigai.
Parašyti metodą ideti($kiekis), kuris prideda pinigus į piniginę.
Jeigu kiekis nedidesnis už 2, tai prideda prie metaliniaiPinigai, jeigu didesnis nei 2 prie popieriniaiPinigai.
Parašykite metodą skaiciuoti(), kuris suskaičiuotų ir atspausdintų popieriniaiPinigai ir metaliniaiPinigai sumą.
Sukurti klasės objektą ir pademonstruoti veikimą. */

class Pinigine
{
    private $popieriniaiPinigai;
    private $metaliniaiPinigai;

    public function ideti($kiekis)
    {
        if ($kiekis <= 2) {
            $this->metaliniaiPinigai += $kiekis;
        } else {
            $this->popieriniaiPinigai += $kiekis;
        }
    }

    public function skaiciuoti()
    {
        return $this->metaliniaiPinigai + $this->popieriniaiPinigai;
    }
}

$me = new Pinigine();
$me->ideti(5);
$me->ideti(1);

// echo $me->skaiciuoti();

/* 2. Sukurti klasę Stiklinė. Sukurti privačią savybę tūris ir kiekis. Parašyti metodą ipilti($kiekis), kuris keistų savybę kiekis.
Jeigu stiklinės tūris yra mažesnis nei pilamas kiekis- kiekis netelpa ir būna lygus tūriui. Parašyti metodą ispilti(), kuris grąžiną kiekį.
Sukurti tris stiklines objektus su tūriais: 200, 150, 100. Didžiausią pripilti pilną ir tada ją ispilti į mažesnę stiklinę, o mažesnę į dar mažesnę. */

class Stikline
{
    private $turis;
    private $kiekis;

    public function __construct($turis)
    {
        $this->turis = $turis;
    }

    public function ipilti($kiekis)
    {
        if ($this->turis < $kiekis) {
            $this->kiekis = $this->turis;
        } else {
            $this->kiekis = $kiekis;
        }
    }

    public function ispilti()
    {
        return $this->kiekis;
    }
}

$glass1 = new Stikline(200);
$glass2 = new Stikline(150);
$glass3 = new Stikline(100);

$glass1->ipilti(500);
$glass2->ipilti($glass1->ispilti());
$glass3->ipilti($glass2->ispilti());

/* 3. Sukurti klasę Grybas. Sukurti klasę Krepsys.
Grybas turi tris privačias savybes: valgomas, sukirmijes, svoris.
Kuriant Grybo objektą jo savybės turi būti atsitiktinai priskiriamos taip: valgomas- true arba false, sukirmijes- true arba false ir svoris- nuo 5 iki 45.
Eiti grybauti, t.y. Kurti naujus Grybas objektus, jeigu nesukirmijęs ir valgomas dėti į Krepsi objektą, kol bus pririnkta 500 svorio nesukirmijusių ir valgomų grybų. */

class Grybas
{
    private $valgomas, $sukirmijes, $svoris;

    public function __construct()
    {
        // $array = [
        //     true,
        //     false,
        // ];

        $this->valgomas = rand(0, 1); //$array[array_rand($array)];
        $this->sukirmijes = rand(0, 1); //$array[array_rand($array, 1)];
        $this->svoris = rand(5, 45);
    }

    public function yraGeras()
    {
        return $this->valgomas && !$this->sukirmijes;
    }

    public function getSvoris()
    {
        return $this->svoris;
    }
}

class Krepsys
{
    private $turinys, $svoris;

    public function ideti($grybas)
    {
        if ($this->svoris < 500) {
            $this->svoris += $grybas->getSvoris();
            $this->turinys[] = $grybas;

            return true;
        } else {
            return false;
        }
    }

    public function rodytiTurini()
    {
        echo 'Svoris: ' . $this->svoris;
        _dc($this->turinys);
    }
}

$grybauti = true;
$krepsys = new Krepsys();

while ($grybauti) {
    $grybas = new Grybas();

    if ($grybas->yraGeras()) {
        if (!$krepsys->ideti($grybas)) {
            break;
        }
    }
}

$krepsys->rodytiTurini();
