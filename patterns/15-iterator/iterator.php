<?php
class Department
{
    private $name;
    private $desc;

    public function __construct($name, $desc)
    {
        $this->name = $name;
        $this->desc = $desc;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
}

class ComputerCollegeIterator implements \Iterator
{
    private $position;
    private $departments;

    public function __construct($departments)
    {
        $this->departments = $departments;
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->departments[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->departments[$this->position]);
    }
}


interface College
{
    public function getName(): string;
    public function addDepartment($name, $desc);
    public function createIterator();
}

class ComputerCollege implements College
{
    private $departments;

    public function __construct()
    {
        $this->addDepartment('PHP', 'PHP');
        $this->addDepartment('Java', 'Java');
        $this->addDepartment('Golang', 'Golang');
    }

    public function getName(): string
    {
        return __METHOD__;
    }

    public function addDepartment($name, $desc)
    {
        $this->departments[] = new Department($name, $desc);
    }

    public function createIterator(): \Iterator
    {
        return new ComputerCollegeIterator($this->departments);
    }
}

class InfoCollege implements College
{
    private $departments;

    public function __construct()
    {
        $this->addDepartment('PHP2', 'PHP');
        $this->addDepartment('Java2', 'Java');
        $this->addDepartment('Golang2', 'Golang');
    }

    public function getName(): string
    {
        return __METHOD__;
    }

    public function addDepartment($name, $desc)
    {
        $this->departments[] = new Department($name, $desc);
    }

    public function createIterator(): array
    {
        return $this->departments;
    }
}

function printColl(College $coll) {
    foreach ($coll->createIterator() as $dep) {
        echo 'name: '.$dep->getName().' & desc: '.$dep->getDesc().PHP_EOL;
    }
}

$c = new ComputerCollege();
printColl($c);

echo '-----------------------'.PHP_EOL;
printColl($c);