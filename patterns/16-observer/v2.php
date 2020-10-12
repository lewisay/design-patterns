<?php

interface Observer
{
    public function update($temperature, $pressure, $humidity);
}

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

class CurrentConditions implements Observer
{
    private $temperature;
    private $pressure;
    private $humidity;

    public function update($temperature, $pressure, $humidity)
    {
        $this->temperature = $temperature;
        $this->pressure = $pressure;
        $this->humidity = $humidity;

        $this->display();
    }

    public function display()
    {
        echo 'temperature: '.$this->temperature.PHP_EOL;
        echo 'pressure: '.$this->pressure.PHP_EOL;
        echo 'humidity: '.$this->humidity.PHP_EOL;
    }
}

class Other implements Observer
{
    public function update($temperature, $pressure, $humidity)
    {
        echo __METHOD__.PHP_EOL;
        echo 'temperature: '.$temperature.PHP_EOL;
        echo 'pressure: '.$pressure.PHP_EOL;
        echo 'humidity: '.$humidity.PHP_EOL;
    }
}

class WeatherData implements Subject
{
    private $temperatrue;
    private $pressure;
    private $humidity;

    private $observers;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperatrue, $this->pressure, $this->humidity);
        }
    }

    public function setData($temperatrue, $pressure, $humidity)
    {
        $this->temperatrue = $temperatrue;
        $this->pressure = $pressure;
        $this->humidity = $humidity;

        $this->notify();
    }
}

$w = new WeatherData();
$w->attach(new CurrentConditions());
$w->setData(10, 20, 30);

echo '------- data change -------'.PHP_EOL;
$w->setData(40, 50, 60);

echo '------- attach other -------'.PHP_EOL;
$w->attach(new Other());
$w->setData(40, 50, 60);