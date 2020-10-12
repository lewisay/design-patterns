<?php

abstract class Shape
{
    public abstract function draw();
}

class Rectangle extends Shape
{
    public function draw()
    {
        echo 'rectangle'.PHP_EOL;
    }
}

class Triangle extends Shape
{
    public function draw()
    {
        echo 'Triangle'.PHP_EOL;
    }
}

class Circle extends Shape
{
    public function draw()
    {
        echo 'circle'.PHP_EOL;
    }
}

class GraphicEditor
{
    public function drawShape(Shape $s)
    {
       $s->draw();
    }
}

$g = new GraphicEditor();

$g->drawShape(new Circle());
$g->drawShape(new Rectangle());

// new
$g->drawShape(new Triangle());