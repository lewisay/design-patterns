<?php

interface Interface4
{
    public function m1();
    public function m2();
    public function m3();
    public function m4();
}

abstract class AbsAdapter implements Interface4
{
    public function m1(){}
    public function m2(){}
    public function m3(){}
    public function m4(){}
}

$a = new class extends AbsAdapter {
    public function m1()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function m2()
    {
        echo __METHOD__.PHP_EOL;
    }
};

$a->m1();
$a->m2();