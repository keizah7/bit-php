<?php

class Stop
{
    const MAX_GNOMS = 33;

    private $gnoms, $fastStop;
    private static $allGnoms = 0;



    public function __construct()
    {
        $this->gnoms = rand(0, self::MAX_GNOMS);
        self::addGnoms($this->gnoms);
        $this->fastStop = (rand(0, 1)) ? true : false;

    }

    public static function getAllGnoms()
    {
        return self::$allGnoms;
    }

    protected static function addGnoms($count)
    {
        self::$allGnoms += $count;
    }

    protected static function removeGnoms($count)
    {
        self::$allGnoms -= $count;
    }

    public function busArrived(Bus $bus)
    {
        $bus->setReturn();

        if ($bus->isFast() && !$this->fastStop) {
            return;
        }

        if ($bus->isFull()) {
            return;
        }

        if ($bus->getSeatsLeft() >=  $this->gnoms) { //telpa visi
            $bus->addPassegers($this->gnoms);
            self::removeGnoms($this->gnoms);
            $this->gnoms = 0;
        }
        else {
            $canAdd = $bus->getSeatsLeft();
            $bus->addPassegers($canAdd);
            self::removeGnoms($canAdd);
            $this->gnoms -= $canAdd;

        }



    }




}