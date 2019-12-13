<?php

class Arbuzas
{
    protected $svoris   = 7;
    const MATAS         = 'KG';

    public function getSvoris(): int
    {
        return $this->svoris;
    }

    public function setSvoris(int $value): void
    {
        if($svoris < 7) {
            return;
        }
        
        $this->svoris = $value;
    }
}

$object = new Arbuzas;
_dump($object);

// echo $object->svoris;

// $object->svoris = 10;
// echo $object->svoris;
echo '<br><br>';

echo $object->getSvoris();
