<?php

interface Brand
{
    public function open();
    public function close();
    public function call();
}

class XiaoMi implements Brand
{
    public function open()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function close()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function call()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Vivo implements Brand
{
    public function open()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function close()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function call()
    {
        echo __METHOD__.PHP_EOL;
    }
}

abstract class Phone
{
    private $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    protected function open()
    {
        $this->brand->open();
    }

    protected function close()
    {
        $this->brand->close();
    }

    protected function call()
    {
        $this->brand->call();
    }
}

class FoldedPhone extends Phone
{
    public function __construct($brand)
    {
        parent::__construct($brand);
    }

    public function open()
    {
        parent::open();
        echo __METHOD__.PHP_EOL;
    }

    public function close()
    {
        parent::close();
        echo __METHOD__.PHP_EOL;
    }

    public function call()
    {
        parent::call();
        echo __METHOD__.PHP_EOL;
    }
}

class UpRightPhone extends Phone
{
    public function __construct($brand)
    {
        parent::__construct($brand);
    }

    public function open()
    {
        parent::open();
        echo __METHOD__.PHP_EOL;
    }

    public function close()
    {
        parent::close();
        echo __METHOD__.PHP_EOL;
    }

    public function call()
    {
        parent::call();
        echo __METHOD__.PHP_EOL;
    }
}

$p = new FoldedPhone(new XiaoMi());
$p->open();
$p->call();
$p->close();

echo '----------------'.PHP_EOL;
$p = new FoldedPhone(new Vivo());
$p->open();
$p->call();
$p->close();