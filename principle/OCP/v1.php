<?php

class GraphicEditor
{
    public function drawShape(Shape $s)
    {

        if ($s->getType() == Shape::RECTANGLE) {
            $this->drawRectangle($s);
        } else if ($s->getType() == Shape::CIRCLE) {
            $this->drawCircle($s);
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
}

abstract class Shape
{
    const CIRCLE = 1;
    const RECTANGLE = 2;

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

$g = new GraphicEditor();

$g->drawShape(new Circle());
$g->drawShape(new Rectangle());