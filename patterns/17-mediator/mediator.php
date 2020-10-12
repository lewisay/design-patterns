<?php

abstract class Mediator
{
    public abstract function register($name, Colleague $colleague);
    public abstract function getMessage($stateChange, $name);
    public abstract function sendMessage();
}

class ConcreteMediator extends Mediator
{
    private $colleagues;

    public function register($name, Colleague $colleague)
    {
        $this->colleagues[$name] = $colleague;
    }

    public function getMessage($stateChange, $name)
    {
        if ($this->colleagues[$name] instanceof Alarm) {
            if ($stateChange == 0) {
                $this->colleagues['curtains']->upCurtains();
            }
        }
        // ...
    }

    public function sendMessage()
    {

    }
}

abstract class Colleague
{
    private $mediator;
    protected $name;

    public function __construct(Mediator $mediator, $name)
    {
        $this->mediator = $mediator;
        $this->name = $name;
    }

    public function getMediator()
    {
        return $this->mediator;
    }

    public abstract function sendMessage($stateChange);
}

class Alarm extends Colleague
{
    public function __construct(Mediator $mediator, $name)
    {
        parent::__construct($mediator, $name);
        $mediator->register($name, $this);
    }

    public function sendAlarm($stateChange)
    {
        $this->sendMessage($stateChange);
    }

    public function sendMessage($stateChange)
    {
        $this->getMediator()->getMessage($stateChange, $this->name);
    }
}

class Curtains extends Colleague
{
    public function __construct(Mediator $mediator, $name)
    {
        parent::__construct($mediator, $name);
        $mediator->register($name, $this);
    }

    public function sendMessage($stateChange)
    {
        $this->getMediator()->getMessage($stateChange, $this->name);
    }

    public function upCurtains()
    {
        echo __METHOD__.PHP_EOL;
    }
}

$mediator = new ConcreteMediator();
$alarm = new Alarm($mediator, 'alarm');
$curtains = new Curtains($mediator, 'curtains');
$alarm->sendAlarm(0);
