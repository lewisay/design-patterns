<?php

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
     * 进度条
     *
     * @var ProgressBar
     */
    private $progressBar;

    /**
     * 点击btn 进行文件分割
     *
     * @param void
     * @return void
     */
    public function btnClick()
    {
        // .. $progressBar =  ...

        $fsp = new fileSplitter($this->filePath, $this->number, $this->progressBar);
        $fsp->Split();
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
     * @var ProgressBar
     */
    private $progressBar;

    public function __construct($filePath, $number, $progressBar)
    {
        $this->filePath = $filePath;
        $this->number = $number;
        $this->progressBar = $progressBar;
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
            if ($this->progressBar) {
                $this->progressBar->process(($i + 1) / $this->number);
            }
        }
    }
}

class ProgressBar
{
    public function process($percent)
    {

    }
}