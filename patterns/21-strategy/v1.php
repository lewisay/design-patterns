<?php

/**
 * @author lewisay <lewisay@163.com>
 */
interface Comparable
{
    public function compareTo($object);
}

class Person implements Comparable
{
    private $name;
    private $age;
    private $height;

    public function __construct($name, $age, $height)
    {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
    }

    public function compareTo($object)
    {
        return $this->age <=> $object->age;
    }

    // 两种比较方式无法并存
    // public function compareTo($object)
    // {
    //     return $this->height <=> $object->height;
    // }

    public function __toString()
    {
        return implode(' & ', ['name:'.$this->name, 'age:'.$this->age, 'height:'.$this->height]);
    }
}

class Dog implements Comparable
{
    private $name;
    private $weight;

    public function __construct($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    public function compareTo($object)
    {
        return $this->weight <=> $object->weight;
    }

    public function __toString()
    {
        return implode(' & ', ['name:'.$this->name, 'weight:'.$this->weight]);
    }
}

function selectionSort($comparables) {
    $len = count($comparables);
    $pos = null;

    for ($i = 0; $i < $len - 1; $i++) {
        $pos = $i;

        for ($j = $i + 1; $j < $len; $j++) {
            if ($comparables[$j]->compareTo($comparables[$pos]) > 0) {
                $pos = $j;
            }
        }

        $temp = $comparables[$i];
        $comparables[$i] = $comparables[$pos];
        $comparables[$pos] = $temp;
    }

    return $comparables;
}

$p1 = new Person('hello1', 40, 180);
$p2 = new Person('hello2', 30, 181);
$p3 = new Person('hello3', 20, 182);

foreach (selectionSort([$p1, $p2, $p3]) as $ins) {
    echo $ins.PHP_EOL;
}

echo str_repeat('-', 30).PHP_EOL;

$d1 = new Dog('hello1', 2);
$d2 = new Dog('hello2', 3);
$d3 = new Dog('hello3', 4);

foreach (selectionSort([$d1, $d2, $d3]) as $ins) {
    echo $ins.PHP_EOL;
}