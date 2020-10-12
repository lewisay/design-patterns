<?php

class House
{
    public $basic;
    public $wall;
    public $roofed;
}

abstract class HouseBuilder
{
    protected $house;

    public abstract function buildBasic();
    public abstract function buildWalls();
    public abstract function roofed();

    public function build()
    {
        return $this->house;
    }
}

class NormalHouse extends HouseBuilder
{
    public function __construct()
    {
        $this->house = new House();
    }

    public function buildBasic()
    {
        // $this->house ...
        echo __METHOD__.PHP_EOL;
    }

    public function buildWalls()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function roofed()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class HighBuilding extends HouseBuilder
{
    public function __construct()
    {
        $this->house = new House();
    }

    public function buildBasic()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function buildWalls()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function roofed()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class HouseDirector
{
    private $houseBuilder;

    public function __construct(HouseBuilder $houseBuilder)
    {
        $this->houseBuilder = $houseBuilder;
    }

    public function buildHouse(): House
    {
        $this->houseBuilder->buildBasic();
        $this->houseBuilder->buildWalls();
        $this->houseBuilder->roofed();
        return $this->houseBuilder->build();
    }
}

$d = new HouseDirector(new NormalHouse());
$house = $d->buildHouse();

echo '-------'.PHP_EOL;
$d = new HouseDirector(new HighBuilding());
$house = $d->buildHouse();