<?php

// 不同的交通工具使用同一个 run 方法，违反单一职责
class Vehicle
{
    public function run($name)
    {
        echo $name.' is running on highway...'.PHP_EOL;
    }
}

$v = new Vehicle();
$v->run('bike');
$v->run('car');
$v->run('aircraft');