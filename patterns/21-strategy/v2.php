<?php

/**
 * @author lewisay <lewisay@163.com>
 */
interface Comparator
{
    public function compare($object1, $object2);
}

class Person
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

    public function getAge()
    {
        return $this->age;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function __toString()
    {
        return implode(' & ', ['name:'.$this->name, 'age:'.$this->age, 'height:'.$this->height]);
    }
}

class AgeStrategy implements Comparator
{
    public function compare($object1, $object2)
    {
        return $object1->getAge() <=> $object2->getAge();
    }
}

class HeightStrategy implements Comparator
{
    public function compare($object1, $object2)
    {
        return $object1->getHeight() <=> $object2->getHeight();
    }
}

function selectionSort($comparables, Comparator $comparator) {
    $len = count($comparables);
    $pos = null;

    for ($i = 0; $i < $len - 1; $i++) {
        $pos = $i;

        for ($j = $i + 1; $j < $len; $j++) {
            if ($comparator->compare($comparables[$j], $comparables[$pos]) > 0) {
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

foreach (selectionSort([$p1, $p2, $p3], new AgeStrategy()) as $ins) {
    echo $ins.PHP_EOL;
}

echo str_repeat('-', 30).PHP_EOL;

foreach (selectionSort([$p1, $p2, $p3], new HeightStrategy()) as $ins) {
    echo $ins.PHP_EOL;
}
