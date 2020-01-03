<?php

class Stop
{
    const MAX_PASS = 33;

    private $passengers = [], $fastStop;
    private static $allPassengers = 0;



    public function __construct()
    {
        $passCount = rand(0, self::MAX_PASS);
        foreach(range(1, $passCount) as $pass) {
            $this->passengers[] = new Passenger;
        }
        self::addPassengers($passCount);
        $this->fastStop = (rand(0, 1)) ? true : false;

    }

    public static function getAllPassengers()
    {
        return self::$allPassengers;
    }

    protected static function addPassengers($count)
    {
        self::$allPassengers += $count;
    }

    protected static function removePassengers($count)
    {
        self::$allPassengers -= $count;
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

        foreach ($this->passengers as $key => $passenger) {
            $result = $bus->add($passenger);
            if ($result) {
                unset($this->passengers[$key]);
                self::removePassengers(1);
            }
        }

 


    }




}