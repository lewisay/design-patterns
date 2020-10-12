<?php

interface Interface1
{
    public function operation1();
}

interface Interface2
{
    public function operation2();
    public function operation3();
}

interface Interface3
{
    public function operation4();
    public function operation5();
}

// 实现接口
class B implements Interface1, Interface2
{
    public function operation1()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function operation2()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function operation3()
    {
        echo __METHOD__.PHP_EOL;
    }
}

// 实现接口
class D implements Interface1, Interface3
{
    public function operation1()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function operation4()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function operation5()
    {
        echo __METHOD__.PHP_EOL;
    }
}

// 通过接口依赖类B, 使用1，2，3方法
class A
{
    public function depend1(Interface1 $api)
    {
        $api->operation1();
    }

    public function depend2(Interface2 $api)
    {
        $api->operation2();
    }

    public function depend3(Interface2 $api)
    {
        $api->operation3();
    }
}

// 通过接口依赖类D, 使用1，4，5方法
class C
{
    public function depend1(Interface1 $api)
    {
        $api->operation1();
    }

    public function depend2(Interface3 $api)
    {
        $api->operation4();
    }

    public function depend3(Interface3 $api)
    {
        $api->operation5();
    }
}