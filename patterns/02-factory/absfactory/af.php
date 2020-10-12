<?php

interface AbsFactory
{
    public function createPizza($type): Pizza;
}

class BJFactory implements AbsFactory
{
    public function createPizza($type): Pizza
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new BJCheesePizza($type);
        } else if ($type == 'greet') {
            $pizza = new BJGreekPizza($type);
        }
        return $pizza;
    }
}

class LDFactory implements AbsFactory
{
    public function createPizza($type): Pizza
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new LDCheesePizza($type);
        } else if ($type == 'greet') {
            $pizza = new LDGreekPizza($type);
        }
        return $pizza;
    }
}

class OrderPizza
{
    private $factory;

    public function __construct(AbsFactory $factory)
    {
        $this->factory = $factory;
    }

    public function place($type)
    {
       return $this->factory->createPizza($type);
    }
}

abstract class Pizza
{
    // 名称
    protected $name;

    // 准备原材料
    public abstract function prepare();

    // 烘烤
    public function bake()
    {
        echo $this->name.' baking;'.PHP_EOL;
    }

    // 切分
    public function cut()
    {
        echo $this->name.' cut;'.PHP_EOL;
    }

    // 打包
    public function box()
    {
        echo $this->name.' box;'.PHP_EOL;
    }
}

class BJCheesePizza extends Pizza
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo __METHOD__.'$prepare cheese...'.PHP_EOL;
    }
}

class BJGreekPizza extends Pizza
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo __METHOD__.'$prepare cheese...'.PHP_EOL;
    }
}

class LDCheesePizza extends Pizza
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo __METHOD__.'$prepare cheese...'.PHP_EOL;
    }
}

class LDGreekPizza extends Pizza
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo __METHOD__.'$prepare cheese...'.PHP_EOL;
    }
}

$order = new OrderPizza(new BJFactory());
$pizza = $order->place('cheese');

$pizza->prepare();
$pizza->bake();
$pizza->cut();
$pizza->box();