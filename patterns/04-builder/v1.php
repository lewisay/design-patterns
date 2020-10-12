<?php
abstract class House
{
    public abstract function buildBasic();  // 地基
    public abstract function buildWalls();  // 砌墙
    public abstract function roofed();      // 封顶

    public function build()
    {
        $this->buildBasic();
        $this->buildWalls();
        $this->roofed();
    }
}

// 普通房子
class NormalHouse extends House
{
    public function buildBasic()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function buildWalls()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function roofed()
    {
        echo __METHOD__.PHP_EOL;
    }
}

$n = new Normal();
$n->build();

