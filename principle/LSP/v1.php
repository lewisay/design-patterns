<?php

class A
{
    public function func1(int $num1, int $num2)
    {
        return $num1 - $num2;
    }
}

class B extends A
{
    public function func1(int $num1, int $num2)
    {
        return $num1 + $num2;
    }

    public function func2(int $num1, int $num2)
    {
        return $this->func1($num1, $num2) + 9;
    }
}

$a = new A();
echo '2 - 1 = '.$a->func1(2, 1).PHP_EOL;
echo '1 - 2 = '.$a->func1(1, 2).PHP_EOL;

echo '-------------'.PHP_EOL;
$b = new B();
echo '2 - 1 = '.$b->func1(2, 1).PHP_EOL;
echo '1 - 2 = '.$b->func1(1, 2).PHP_EOL;
echo '1 + 2 + 9 = '.$b->func2(1, 2).PHP_EOL;