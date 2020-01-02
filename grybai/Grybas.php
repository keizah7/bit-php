<?php

class Grybas
{
    private $valgomas, $sukirmijes, $svoris;


   public function __construct()
   {
        $this->valgomas = (rand(0, 1)) ? true : false;
        $this->sukirmijes = (rand(0, 1)) ? true : false;
        $this->svoris = rand(5, 45);
   }


   public function arValgomas()
   {
       return $this->valgomas;
   }

   public function arSukirmijes()
   {
       return $this->sukirmijes;
   }

   public function koksSvoris()
   {
       return $this->svoris;
   }


}