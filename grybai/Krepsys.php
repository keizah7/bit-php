<?php

class Krepsys
{
    private $vietos = 500; // tiek telpa
    private $uzpildyta = 0; // tiek dabar yra
    private $grybai = 0; // geri grybai
    private $visiGrybai = 0; // visi grybai


    public function isFull()
    {
        return ($this->vietos <= $this->uzpildyta); // true arba false
    }

    public function add(Grybas $grybas)
    {
        $this->visiGrybai++;
        if (!$grybas->arValgomas()) {
            return $this;
        }
        if ($grybas->arSukirmijes()) {
            return $this;
        }

        $this->grybai++;
        $this->uzpildyta += $grybas->koksSvoris();
        return $this;
    }


}