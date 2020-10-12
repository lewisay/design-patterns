<?php

class Singleton
{
    private function __construct()
    {

    }

    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }
}

$ins1 = Singleton::getInstance();
$ins2 = Singleton::getInstance();

var_dump($ins2 === $ins1);