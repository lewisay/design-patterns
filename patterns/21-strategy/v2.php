<?php

interface FlyBehavior
{
    public function fly();
}

interface QuackBehavior
{
    public function quack();
}

class NoFlyBehavior implements FlyBehavior
{
    public function fly()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class GoodFlyBehavior implements FlyBehavior
{
    public function fly()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class BadFlyBehavior implements FlyBehavior
{
    public function fly()
    {
        echo __METHOD__.PHP_EOL;
    }
}

abstract class Duck
{
    protected $flyBehavior;

    public function fly()
    {
        if ($this->flyBehavior) {
            $this->flyBehavior->fly();
        }
    }

    public abstract function display();
}

class WildDuck extends Duck
{
    public function __construct()
    {
        $this->flyBehavior = new GoodFlyBehavior();
    }

    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class PekingDuck extends Duck
{
    public function __construct()
    {
        $this->flyBehavior = new NoFlyBehavior();
    }

    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function setFlyBehavior(FlyBehavior $behavior)
    {
        $this->flyBehavior = $behavior;
    }
}

class ToyDuck extends Duck
{
    public function __construct()
    {
        $this->flyBehavior = new NoFlyBehavior();
    }

    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }
}

$p = new PekingDuck();
$p->display();
$p->fly();

$p->setFlyBehavior(new GoodFlyBehavior());
$p->fly();
