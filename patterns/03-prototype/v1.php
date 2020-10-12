<?php
class Sheep
{
    public $name;
    public $age;
    public $color;

    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function __tostring()
    {
        return 'name:'.$this->name.';age:'.$this->age.';color:'.$this->color;
    }
}

$s1 = new Sheep("tom", 1, "white");
$s2 = new Sheep("tom", 1, "white");
$s3 = new Sheep("tom", 1, "white");

echo $s1.PHP_EOL;
echo $s1.PHP_EOL;
echo $s1.PHP_EOL;