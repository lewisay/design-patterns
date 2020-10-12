<?php

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
    public static function generate($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new CheesePizza($type);
        } else if ($type == 'greek') {
            $pizza = new GreekPizza($type);
        }
        // 新增 Pizza 这里需要修改

        return $pizza;
    }
}

$type = $argv[1] ?? 'cheese';
$order = new OrderPizza();
$pizza = $order->place($type);
if ($pizza === null) {
    echo 'unsupported type'.PHP_EOL;
    exit;
}

$pizza->prepare();
$pizza->bake();
$pizza->cut();
$pizza->box();