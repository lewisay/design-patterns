<?php

interface Observer
{
    public function update($percent);
}

class Window implements Observer
{
    /**
     * 待分割文件路径
     *
     * @var string
     */
    private $filePath;

    /**
     * 分割数量
     *
     * @var int
     */
    private $number;

    /**
     * 点击btn 进行文件分割
     *
     * @param void
     * @return void
     */
    public function btnClick()
    {
        $fsp = new fileSplitter($this->filePath, $this->number);
        $fsp->attach($this);

        $fsp->Split();
    }

    public function update($percent)
    {

    }
}

class fileSplitter implements Subject
{
    /**
     * 待分割文件路径
     *
     * @var string
     */
    private $filePath;

    /**
     * 分割数量
     *
     * @var int
     */
    private $number;

    /**
     * 存放所有的观察者
     *
     * @var array
     */
    private $observers;

    public function __construct($filePath, $number)
    {
        $this->filePath = $filePath;
        $this->number = $number;
    }

    /**
     * 添加观察者
     *
     * @param Observer $Observer
     * @return void
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify($percent)
    {
        foreach ($this->observers as $observer) {
            $observer->update($percent);
        }
    }

    /**
     * 文件分割
     *
     *
     * @param void
     * @return void
     */
    public function Split()
    {
        // ... 文件读取

        // 文件切割
        for ($i = 0; $i < $this->number; $i++) {
            $this->notify(($i + 1) / $this->number);
        }
    }
}
