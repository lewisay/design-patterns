<?php

abstract class Drink
{
    private $desc;   // 描述
    private $price; // 价格

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public abstract function cost();
}

class Coffee extends Drink
{
    public function cost()
    {
        return $this->getPrice();
    }
}

class Espresso extends Coffee
{
    public function __construct()
    {
        $this->setDesc(__METHOD__);
        $this->setPrice(10);
    }
}

class Americano extends Coffee
{
    public function __construct()
    {
        $this->setDesc(__METHOD__);
        $this->setPrice(5);
    }
}

class Singleorigin extends Coffee
{
    public function __construct()
    {
        $this->setDesc(__METHOD__);
        $this->setPrice(4);
    }
}

class Decorator extends Drink
{
    private $drink;

    public function __construct($drink)
    {
        $this->drink = $drink;
    }

    public function cost()
    {
        return parent::getPrice() + $this->drink->cost();
    }

    public function getDesc()
    {
        return parent::getDesc().' '.parent::getPrice().' && '.$this->drink->getDesc().' && '.$this->drink->getPrice();
    }
}

class Chocolate extends Decorator
{
    public function __construct(Drink $drink)
    {
        parent::__construct($drink);
        $this->setDesc(__METHOD__);
        $this->setPrice(3);
    }
}

class Milk extends Decorator
{
    public function __construct(Drink $drink)
    {
        parent::__construct($drink);
        $this->setDesc(__METHOD__);
        $this->setPrice(2.5);
    }
}

class Soy extends Decorator
{
    public function __construct(Drink $drink)
    {
        parent::__construct($drink);
        $this->setDesc(__METHOD__);
        $this->setPrice(1.5);
    }
}

$order = new Americano();
echo 'desc: '.$order->getDesc().PHP_EOL;
echo 'price: '.$order->cost().PHP_EOL;

echo '---------------'.PHP_EOL;
$order = new Milk($order);
echo 'desc: '.$order->getDesc().PHP_EOL;
echo 'price: '.$order->cost().PHP_EOL;

echo '---------------'.PHP_EOL;
$order = new Chocolate($order);
echo 'desc: '.$order->getDesc().PHP_EOL;
echo 'price: '.$order->cost().PHP_EOL;

echo '---------------'.PHP_EOL;
$order = new Chocolate($order);
echo 'desc: '.$order->getDesc().PHP_EOL;
echo 'price: '.$order->cost().PHP_EOL;