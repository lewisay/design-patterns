<?php

class SimpleFactory
{
    public function createPizza($type): Pizza
    {
        $pizza = null;
        switch ($type) {
            case 'cheese':
                $pizza = new CheesePizza($type);
                break;
            case 'greek':
                $pizza = new GreekPizza($type);
                break;
        }

        // pizza may be is null

        return $pizza;
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

class CheesePizza extends Pizza
{

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo 'prepare cheese...'.PHP_EOL;
    }
}

class GreekPizza extends Pizza
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare()
    {
        echo 'prepare greek...'.PHP_EOL;
    }
}

class OrderPizza
{
    private $factory;

    public function __construct(SimpleFactory $factory)
    {
        $this->factory = $factory;
    }

    public function generate($type)
    {
       return $this->factory->createPizza($type);
    }
}

$type = $argv[1] ?? 'cheese';
$order = new OrderPizza(new SimpleFactory());
$pizza = $order->place($type);
if ($pizza === null) {
    echo 'unsupported type'.PHP_EOL;
    exit;
}

$pizza->prepare();
$pizza->bake();
$pizza->cut();
$pizza->box();