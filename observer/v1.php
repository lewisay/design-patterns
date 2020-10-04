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
     * 点击btn 进行文件分割
     *
     * @param void
     * @return void
     */
    public function btnClick()
    {
        $fsp = new fileSplitter($this->filePath, $this->number);
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

    public function __construct($filePath, $number)
    {
        $this->filePath = $filePath;
        $this->number = $number;
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

        }
    }
}