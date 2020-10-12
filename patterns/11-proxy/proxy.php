<?php

interface ITeacherDao
{
    public function teach();
}

class TeacherDao implements ITeacherDao
{
    public function teach()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class TeacherDaoProxy implements ITeacherDao
{
    private $target;

    public function __construct(ITeacherDao $target)
    {
        $this->target = $target;
    }

    public function teach()
    {
        echo __METHOD__.':before'.PHP_EOL;

        $this->target->teach();

        echo __METHOD__.':after'.PHP_EOL;
    }
}

$t = new TeacherDaoProxy(new TeacherDao());
$t->teach();