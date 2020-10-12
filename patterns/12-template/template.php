<?php

abstract class SoyaMilk
{
    public final function make()
    {
        $this->select();

        if ($this->needCondiments()) {
            $this->addCondiments();
        }

        $this->soak();
        $this->beat();
    }

    private function select()
    {
        echo __METHOD__.PHP_EOL;
    }

    private function soak()
    {
        echo __METHOD__.PHP_EOL;
    }

    private function beat()
    {
        echo __METHOD__.PHP_EOL;
    }

    protected abstract function addCondiments();

    protected function needCondiments()
    {
        return true;
    }
}

class RedBeanSoyaMilk extends SoyaMilk
{
    protected function addCondiments()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class PureSoyaMilk extends SoyaMilk
{
    protected function addCondiments()
    {
        echo __METHOD__.PHP_EOL;
    }

    protected function needCondiments()
    {
        return false;
    }
}

$r = new RedBeanSoyaMilk();
$r->make();

echo '---------------'.PHP_EOL;
$r = new PureSoyaMilk();
$r->make();