<?php

interface Progress
{
    public function Progress($percent);
}

class Window
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
        $fsp = new fileSplitter($this->filePath, $this->number, $this);
        $fsp->Split();
    }

    public function Progress($percent)
    {

    }
}

class fileSplitter
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
     * 进度条
     *
     * @var Progress
     */
    private $progress;

    public function __construct($filePath, $number, $progress)
    {
        $this->filePath = $filePath;
        $this->number = $number;
        $this->progress = $progress;
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
            if ($this->progress) {
                $this->progress->process(($i + 1) / $this->number);
            }
        }
    }
}
