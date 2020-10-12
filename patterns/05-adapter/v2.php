<?php

class Voltage220V
{
    public function output220V()
    {
        echo __METHOD__.PHP_EOL;
    }
}

interface Voltage5V
{
    public function output5V();
}

class VoltageAdapter implements Voltage5V
{
    private $voltage220V;

    public function __construct(Voltage220V $voltage220V)
    {
        $this->voltage220V = $voltage220V;
    }

    public function output5V()
    {
        $this->voltage220V->output220V();
        // ...
        echo __METHOD__.PHP_EOL;
    }
}

class Phone
{
    public function charging(Voltage5V $v)
    {
        $v->output5V();
    }
}

$p = new Phone();
$p->charging(new VoltageAdapter(new Voltage220V()));

