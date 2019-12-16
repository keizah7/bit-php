<?php

class BriedzioSenelis 
{
    protected $svoris = 45;
    private $alus = 'Daug';
    protected $laisvalaikis = 'Alus';

    static public $kazkas = 'LALALA';

    public function __construct()
    {
        echo '<br>Briedzio SENIO KOnstruktorius<br>';
    }

}

class BriedzioTevas extends BriedzioSenelis
{

    protected $laisvalaikis = 'Briedes';
    static public $kazkas = 'kukukuku';

    public function __construct()
    {
        parent::__construct();
        echo '<br>Briedzio TEVO KOnstruktorius<br>';
    }

}


class BriedisMiskinis extends BriedzioTevas
{
    
    protected $laisvalaikis = 'Instagram';

    static public $kazkas = 'BLABLA';

    
    public function __construct()
    {
        // BriedzioSenelis::__construct();
        
        echo '<br>Briedzio KOnstruktorius<br>';
    }


    
    
    public function garsas()
    {
        echo '<br>Muuuuuuuuu<br>';
        echo $this->laisvalaikis;
        echo '<br>';
        echo static::$kazkas;
    }

    public function getSvoris()
    {
        return $this->svoris;
    }

    public function setSvoris($svoris)
    {
        if ($svoris < 100) {
            echo 'Blogai';
            return;
        }
        $this->svoris = $svoris;
    }


}


$obj1 = new BriedisMiskinis;

var_dump($obj1);

echo '<br><br>';

$obj1->setSvoris(780);

echo '<br><br>';
echo $obj1->getSvoris();
$obj1->garsas();

echo BriedisMiskinis::$kazkas;


