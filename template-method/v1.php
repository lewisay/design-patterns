<?php

class Framework
{
    public function Step1()
    {
        // ...
    }

    public function Step3()
    {
        // ...
    }

    public function Step5()
    {
        // ..
    }
}

class App
{
    public function Step2()
    {

    }

    public function Step5()
    {

    }
}

$fw = new Framework();
$app = new App();

$fw->Step1();

if ($app->Step2()) {
    $fw->Step3();
} else {
    $fw->Step4();
}

$fw->Step5();
