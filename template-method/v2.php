<?php

abstract class Framework
{
    protected function Step1()
    {
        // ...
    }

    protected function Step3()
    {
        // ...
    }

    protected function Step5()
    {
        // ..
    }

    public function run()
    {
        $this->Step1();

        if ($this->Step2()) {
            $this->Step3();
        } else {
            $this->Step4();
        }

        $this->Step5();
    }

    abstract public function Step2();
    abstract public function Step4();
}

class App extends Framework
{
    public function Step2()
    {
        // ...
    }

    public function Step4()
    {
        // ..
    }
}

$app = new App();
$app->run();