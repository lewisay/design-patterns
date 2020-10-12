<?php

abstract class Action
{
    public abstract function getManResult(Man $man);
    public abstract function getWomanResult(Woman $wm);
}

class Success extends Action
{
    public function getManResult(Man $man)
    {
        echo __METHOD__.PHP_EOL;
    }

    public function getWomanResult(Woman $wm)
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Fail extends Action
{
    public function getManResult(Man $man)
    {
        echo __METHOD__.PHP_EOL;
    }

    public function getWomanResult(Woman $wm)
    {
        echo __METHOD__.PHP_EOL;
    }
}

abstract class Person
{
    public abstract function accept(Action $action);
}

class Man extends Person
{
    public function accept(Action $action)
    {
        $action->getManResult($this);
    }
}

class Woman extends Person
{
    public function accept(Action $action)
    {
        $action->getWomanResult($this);
    }
}

class ObjectStruct
{
    private $persons;

    public function attach(Person $p)
    {
        $this->persons[] = $p;
    }

    public function detach(Person $p)
    {
        $key = array_search($p, $this->persons, true);
        if ($key !== false) {
            unset($this->persons[$key]);
        }
    }

    public function display(Action $action)
    {
        foreach ($this->persons as $person) {
            $person->accept($action);
        }
    }
}

$ob = new ObjectStruct();
$ob->attach(new Man());
$ob->attach(new Man());
$ob->attach(new Man());
$ob->attach(new Woman());
$ob->attach(new Woman());

$success = new Success();
$fail = new Fail();

$ob->display($success);
$ob->display($fail);