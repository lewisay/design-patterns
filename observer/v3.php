<?php

class Window implements \SplObserver
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

    public function update(\SplSubject $subject)
    {
        $subject->getPercent();
    }
}

class fileSplitter implements \SplSubject
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

    private $percent;

    public function getPercent()
    {
        return $this->percent;
    }

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
     * @param \SplObserver $Observer
     * @return void
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        $key = array_search($observer,$this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
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
            $this->percent = ($i + 1) / $this->number;
            $this->notify();
        }
    }
}
