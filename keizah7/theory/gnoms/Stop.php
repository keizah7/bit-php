<?php

class Stop
{
    const MAX_PASSENGERS = 10;

    private $passengers, $fastStop;
    private static $allpassengers = 0;

    public function __construct()
    {
        $passengersCount = rand(0, self::MAX_PASSENGERS);

        foreach (range(1, $passengersCount) as $value) {
            $this->passengers[] = new Passenger;
        }

        self::addPassengers($passengersCount);

        $this->fastStop = (rand(0, 1)) ? true : false;
    }

    public static function getAllPassengers()
    {
        return self::$allpassengers;
    }

    protected static function addPassengers($count)
    {
        self::$allpassengers += $count;
    }

    protected static function removePassengers($count)
    {
        self::$allpassengers -= $count;
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

        foreach ($this->passengers as $key => $value) {
            $result = $bus->add($value);
            if ($result) {
                unset($this->passengers[$key]);
                self::removePassengers(1);
            }
        }

        // if ($bus->getSeatsLeft() >= $this->passengers) {
        //     $bus->addPassengers($this->passengers);
        //     self::removePassengers($this->passengers);
        //     $this->passengers = 0;
        // } else {
        //     $canAdd = $bus->getSeatsLeft();
        //     $bus->addPassengers($canAdd);
        //     self::removePassengers($canAdd);
        //     $this->passengers -= $canAdd;
        // }
    }
}
