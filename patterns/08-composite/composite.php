<?php

abstract class OrganizationComponent
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

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function add(OrganizationComponent $oc) {}
    public function remove(OrganizationComponent $oc) {}

    public abstract function print();
}

class University extends OrganizationComponent
{
    private $organizationComponents;

    public function __construct($name, $desc)
    {
        parent::__construct($name, $desc);
    }

    public function add(OrganizationComponent $oc)
    {
        $this->organizationComponents[] = $oc;
    }

    public function remove(OrganizationComponent $oc)
    {
        $key = array_search($this->organizationComponents, $oc);
        if ($key !== false) {
            unset($this->organizationComponents[$key]);
        }
    }

    public function print()
    {
        echo str_repeat('-', 20).$this->getName().str_repeat('-', 20).PHP_EOL;
        foreach ($this->organizationComponents as $oc) {
            $oc->print();
        }
    }
}

class College extends OrganizationComponent
{
    private $organizationComponents;

    public function __construct($name, $desc)
    {
        parent::__construct($name, $desc);
    }

    public function add(OrganizationComponent $oc)
    {
        $this->organizationComponents[] = $oc;
    }

    public function remove(OrganizationComponent $oc)
    {
        $key = array_search($this->organizationComponents, $oc);
        if ($key !== false) {
            unset($this->organizationComponents[$key]);
        }
    }

    public function print()
    {
        echo str_repeat('-', 20).$this->getName().str_repeat('-', 20).PHP_EOL;
        foreach ($this->organizationComponents as $oc) {
            $oc->print();
        }
    }
}

class Department extends OrganizationComponent
{
    public function __construct($name, $desc)
    {
        parent::__construct($name, $desc);
    }

    public function print()
    {
        echo $this->getName().PHP_EOL;
    }
}

$u = new University('清华大学', '世界一流大学');

$c1 = new College('计算机学院', '计算机');
$c2 = new College('信息工程学院', '信息工程');

$c1->add(new Department('软件工程', '软件'));
$c1->add(new Department('网络工程', '网络'));
$c1->add(new Department('计算机科学与技术', '科学与技术'));

$c2->add(new Department('通信工程', '通信'));
$c2->add(new Department('信息工程', '信息'));

$u->add($c1);
$u->add($c2);

$u->print();