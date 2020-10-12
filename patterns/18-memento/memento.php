<?php

class Originator
{
    private $state;

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function saveStateMemento(): Memento
    {
        return new Memento($this->state);
    }

    public function restoreStateFromMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }
}

class Memento
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}

class Caretaker
{
    private $mementos;

    public function add(Memento $memento)
    {
        $this->mementos[] = $memento;
    }

    public function get($index)
    {
        return $this->mementos[$index];
    }
}

$o = new Originator();
$taker = new Caretaker();

$o->setState('state1');
$taker->add($o->saveStateMemento());

$o->setState('state2');
$taker->add($o->saveStateMemento());

$o1 = new Originator();
$o1->restoreStateFromMemento($taker->get(0));
echo $o1->getState().PHP_EOL;

$o2 = new Originator();
$o2->restoreStateFromMemento($taker->get(1));
echo $o2->getState().PHP_EOL;