<?php

class GraphicEditor
{
    public function drawShape(Shape $s)
    {

        if ($s->getType() == Shape::RECTANGLE) {
            $this->drawRectangle($s);
        } else if ($s->getType() == Shape::CIRCLE) {
            $this->drawCircle($s);
        } else if ($s->getType() == Shape::TRIANGLE) {
            $this->drawTriangle($s);
        }
    }

    public function drawRectangle(Shape $r)
    {
        echo 'draw rectangle'.PHP_EOL;
    }

    public function drawCircle(Shape $r)
    {
        echo 'draw circle'.PHP_EOL;
    }

    public function drawTriangle(Shape $r)
    {
        echo 'draw triangle'.PHP_EOL;
    }
}

abstract class Shape
{
    const CIRCLE = 1;       // 圆形
    const RECTANGLE = 2;    // 矩形
    const TRIANGLE = 3;     // 三角形

    public abstract function getType();
}

class Rectangle extends Shape
{
    public function getType()
    {
        return static::RECTANGLE;
    }
}

class Circle extends Shape
{
    public function getType()
    {
        return static::CIRCLE;
    }
}

class Triangle extends Shape
{
    public function getType()
    {
        return static::TRIANGLE;
    }
}

$g = new GraphicEditor();

$g->drawShape(new Circle());
$g->drawShape(new Rectangle());
$g->drawShape(new Triangle());