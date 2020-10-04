<?php

// Shape 接口
interface Shape
{
    public function Draw($paintEvent);
}

// 线
class Line implements Shape
{
    public $start;
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function Draw($paintEvent)
    {
        $paintEvent->DrawLine(
            PaintEvent::RED,
            $this->start->x, $this->start->y,
            $this->end->x, $this->end->y
        );
    }
}

class Rect
{
    public $start;
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function Draw($paintEvent)
    {
        $width = abs($this->end->x - $this->start->x);
        $height = abs($this->end->y - $this->start->y);
        $paintEvent->DrawRectangle(PaintEvent::BLUE, $this->start, $width, $height);
    }
}

// 手绘板
class Wacom
{
    /**
     * 图形集合
     *
     * @var array<Shape>
     */
    private $shaps;

    // ...

    public function OnMouseUp($mouseEvent)
    {
        $this->p2->x = $mouseEvent->x;
        $this->p2->y = $mouseEvent->y;

        if ($this->drawShape == self::LINESHAPE) {
            $this->shaps[] = new Line($this->p1, $this->p2);
        } else if ($this->drawShape == self::RECTSHAPE) {
            $this->shaps[] = new Rect($this->p1, $this->p2);
        }   // ...

        // ...
    }

    public function OnPaint($paintEvent)
    {
        foreach ($this->shaps as $shap) {
            $shap->Draw($paintEvent);
        }
    }
}