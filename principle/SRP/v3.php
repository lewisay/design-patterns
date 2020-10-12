<?php

// 没有对原来的类做大的修改，只是增加方法
// 没有在类基本遵守单一职责原则，但是在方法级别上仍然是遵守单一职责
class Vehicle
{
    public function runHightWay($name)
    {
        echo $name.' is running on highway...'.PHP_EOL;
    }

    public function runAir($name)
    {
        echo $name.' is running on air...'.PHP_EOL;
    }
}

$v = new Vehicle();
$v->runHightWay('bike');
$v->runAir('aircraft');