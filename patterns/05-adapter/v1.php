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

class VoltageAdapter extends Voltage220V implements Voltage5V
{
    public function output5V()
    {
        $this->output220V();
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
$p->charging(new VoltageAdapter());

