<?php

// 员工
class Employee
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

// 学院员工
class CollegeEmployee
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

// 学院管理类
class CollegeManager
{
    public function getAllEmployee()
    {
        $list = [];
        for ($i = 0; $i < 2; $i++) {
            $ce = new CollegeEmployee($i + 1);
            $list[] = $ce;
        }
        return $list;
    }

    public function printAllEmployee()
    {
        foreach ($this->getAllEmployee() as $v) {
            echo 'College Num: '.$v->id.PHP_EOL;
        }
    }
}

// 学校管理类
class SchoolManager
{
    public function getAllEmployee()
    {
        $list = [];
        for ($i = 0; $i < 5; $i++) {
            $ce = new Employee($i + 1);
            $list[] = $ce;
        }
        return $list;
    }

    // 打印 学院、学校员工信息
    public function printAllEmployee(CollegeManager $ce)
    {
        // 学院员工
        $ce->printAllEmployee();

        echo '------------'.PHP_EOL;
        // 学校员工
        foreach ($this->getAllEmployee() as $v) {
            echo 'School Num: '.$v->id.PHP_EOL;
        }
    }
}

$s = new SchoolManager();
$s->printAllEmployee(new CollegeManager());