<?php

// 点
class Point
{
    /**
     * x 坐标值
     *
     * @var float
     */
    public $x;

    /**
     * y 坐标值
     *
     * @var float
     */
    public $y;
}

// 线
class Line
{
    /**
     * 开始点坐标
     *
     * @var Point
     */
    public $start;

    /**
     * 结束点坐标
     *
     * @var Point
     */
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}

// 矩形
class Rect
{
    /**
     * 开始点坐标
     *
     * @var Point
     */
    public $start;

    /**
     * 结束点坐标
     *
     * @var Point
     */
    public $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}

// 手绘板
class Wacom
{
    /**
     * 第一个点
     *
     * @var Point
     */
    private $p1;

    /**
     * 第二个点
     *
     * @var Point
     */
    private $p2;

    /**
     * 线条集合
     *
     * @var array<Line>
     */
    private $lines;

    /**
     * 矩形集合
     *
     * @var array<Rect>
     */
    private $rects;

    /**
     * 绘制类型
     *
     * @var int
     */
    private $drawShape;

    /**
     * 图形类型
     *
     * @var int
     */
    const LINESHAPE = 1;
    const RECTSHAPE = 2;

    /**
     * 鼠标按下
     * ...
     */
    public function OnMouseDown($mouseEvent)
    {
        $this->p1->x = $mouseEvent->x;
        $this->p1->y = $mouseEvent->y;
    }

    /**
     * 鼠标抬起
     * ...
     */
    public function OnMouseUp($mouseEvent)
    {
        $this->p2->x = $mouseEvent->x;
        $this->p2->y = $mouseEvent->y;

        if ($this->drawShape == self::LINESHAPE) {
            $this->lines[] = new Line($this->p1, $this->p2);
        } else if ($this->drawShape == self::RECTSHAPE) {
            $this->rects[] = new Rect($this->p1, $this->p2);
        }   // ...

        // 界面刷新
        $this->refresh();

        // ...
    }

    public function refresh()
    {
        $this->OnPaint(new paintEvent());
    }

    public function OnPaint($paintEvent)
    {
        // 针对直线
        foreach ($this->lines as $line) {
            $paintEvent->DrawLine(
                PaintEvent::RED,
                $line->start->x, $line->start->y,
                $line->end->x, $line->end->y
            );
        }

        // 针对矩形
        foreach ($this->rects as $rect) {
            $width = abs($rect->end->x - $rect->start->x);
            $height = abs($rect->end->y - $rect->start->y);

            $paintEvent->DrawRectangle(
                PaintEvent::BLUE,
                $rect->start,
                $width, $height
            );
        }

	    // ...
    }
}

// 鼠标事件
class MouseEvent
{
    public $x;
    public $y;
}

// 界面绘制事件
class PaintEvent
{
    /**
     * 颜色
     *
     * @var int
     */
    const RED = 0;
    const BLUE = 1;

    /**
     * 绘制一条线
     *
     * @param int $color
     * @param float64 $startX
     * ...
     */
    public function DrawLine($color, $startX, $startY, $endX, $endY)
    {
        // ...
    }

    /**
     * 绘制矩形
     *
     * @param int $color
     * ...
     */
    public function DrawRectangle($color, $point, $width, $height)
    {
        // ...
    }
}