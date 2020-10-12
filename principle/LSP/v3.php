<?php

class Base
{

}

class A extends Base
{
    public function func1(int $num1, int $num2)
    {
        return $num1 - $num2;
    }
}

class B extends Base
{
    private $a;

    public function __construct(A $a)
    {
        $this->a = $a;
    }

    public function func1(int $num1, int $num2)
    {
        return $num1 + $num2;
    }

    public function func2(int $num1, int $num2)
    {
        return $this->func1($num1, $num2) + 9;
    }


    public function func3(int $num1, $num2)
    {
        return $this->a->func1($num1, $num2);
    }
}

$a = new A();
echo '2 - 1 = '.$a->func1(2, 1).PHP_EOL;
echo '1 - 2 = '.$a->func1(1, 2).PHP_EOL;

echo '-------------'.PHP_EOL;
$b = new B($a);
echo '2 + 1 = '.$b->func1(2, 1).PHP_EOL;
echo '1 + 2 = '.$b->func1(1, 2).PHP_EOL;
echo '1 + 2 + 9 = '.$b->func2(1, 2).PHP_EOL;
echo '1 - 2 = '.$b->func3(1, 2).PHP_EOL;