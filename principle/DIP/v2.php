<?php

interface IReceiver
{
    public function getInfo(): string;
}

class Email implements IReceiver
{
    public function getInfo(): string
    {
        return '[Email]: hello, world';
    }
}

class Wechat implements IReceiver
{
    public function getInfo(): string
    {
        return '[Wechat]: hello, world';
    }
}

class Person
{
    public function receiver(IReceiver $receiver)
    {
        echo $receiver->getInfo().PHP_EOL;
    }
}

$p = new Person();
$p->receiver(new Email());
$p->receiver(new Wechat());