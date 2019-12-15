<?php

class ArbuzoSenelis
{
    protected $svoris = 7;
    protected static $senelioPaladis = '30kg';
    const MATAS = 'KG';

    public static function senelisPasake()
    {
        echo 'Paladzio negausit';
    }

    public function __construct()
    {
        echo '<br>Senelis su paladziu<br>';
        self::senelisPasake();
        
    }

    public function setSvoris($svoris)
    {
        if ($svoris < 7) {
            echo 'Blogai';
            return;
        }
        $this->svoris = $svoris;
    }
}


class ArbuzoTevas extends ArbuzoSenelis
{
    public function __construct()
    {
        parent::__construct();
        echo '<br>Tevas<br>';
        self::senelisPasake();
    }
}


class Arbuzas extends ArbuzoTevas
{
    

    
    public function __construct($svoris=99)
    {
        self::senelisPasake();
        $this->svoris = $svoris;

        echo Arbuzas::$senelioPaladis;
        echo '<br>Arbuzo konstruktorius<br>';

        parent::__construct();
    }
    
    public function getSvoris()
    {
        return $this->svoris;
    }

    public function setSvoris($svoris)
    {
        if ($svoris < 5) {
            echo 'Blogai';
            return;
        }
        $this->svoris = $svoris;
    }

    public function seneliDuokPaladzio()
    {
        echo $this->senelioPaladis;
    }



}


$obj1 = new Arbuzas(2,445);
// $obj2 = new Arbuzas;
$obj3 = $obj1;

// echo $obj1->svoris;
echo '<br>';
// $obj1->setSvoris(6);
echo '<br>';
echo $obj1->getSvoris();
echo '<br>';


echo $obj1->seneliDuokPaladzio();
echo '<br>';

var_dump($obj1);
echo '<br>';
var_dump($obj2);
echo '<br>';
var_dump($obj3);

