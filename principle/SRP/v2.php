<?php

// 遵守单一职责
// 新的问题：类膨胀

class HighWayVehicle
{
    public function run($name)
    {
        echo $name.' is running on highway...'.PHP_EOL;
    }
}

class AirVehicle
{
    public function run($name)
    {
        echo $name.' is running on air...'.PHP_EOL;
    }
}

$v = new HighWayVehicle();
$v->run('bike');

$a = new AirVehicle();
$v->run('aircraft');