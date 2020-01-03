<?php

class Bus
{
    const BUS_MAX_SEATS = 
    [
        5,
        15,
        25,
        40
    ];


    private $passengers = [], $seats = 0, $isFast, $capacity, $return = false;
    public static $allBuses = [];

    static public function getBus()
    {
        if (empty(self::$allBuses)) {
            return new self;
        }

        $count = count(self::$allBuses);
        $lastBus = self::$allBuses[$count-1];

        if ($lastBus->isFull() || $lastBus->return) {
            return new self;
        }
        return $lastBus;
    }

    public function __construct()
    {
        $this->capacity = array_rand(array_flip(self::BUS_MAX_SEATS));

        $this->isFast = (rand(0, 1)) ? true : false;

        self::$allBuses[] = $this;
    }

    public function isFast()
    {
        return $this->isFast;
    }

    public function isFull()
    {
        return ($this->capacity == $this->seats);
    }

    public function getSeatsLeft()
    {
        return $this->capacity - $this->seats;
    }



    public function add(Passenger $passenger)
    {
        if ($this->getSeatsLeft() >= $passenger->getAss()) {
            $this->seats += $passenger->getAss();
            $this->passengers[] = $passenger;
            return true;
        }
        return false;
    }


    public function setReturn()
    {
        $this->return = true;
    }



}