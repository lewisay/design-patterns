<?php

class Email
{
    public function getInfo()
    {
        return '[Email]: hello, world';
    }
}

// receiver 限定了只能接受 Email 类型数据，若想接受其他类型数据，需要新增方法
class Person
{
    public function receiver(Email $email)
    {
        echo $email->getInfo().PHP_EOL;
    }
}

$p = new Person();
$p->receiver(new Email());