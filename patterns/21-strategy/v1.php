<?php

abstract class Duck
{
    public function quack()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function swim()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function fly()
    {
        echo __METHOD__.PHP_EOL;
    }

    public abstract function display();
}

class WildDuck extends Duck
{
    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class PekingDuck extends Duck
{
    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function fly()
    {
        echo 'can\'t fly;'.__METHOD__.PHP_EOL;
    }
}

class ToyDuck extends Duck
{
    public function display()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function quack()
    {
        echo 'can\'t quack;'.PHP_EOL;
    }

    public function swim()
    {
        echo 'can\'t swim;'.PHP_EOL;
    }

    public function fly()
    {
        echo 'can\'t fly;'.PHP_EOL;
    }
}

$t = new ToyDuck();
$t->display();
$t->quack();
$t->swim();
$t->fly();