<?php

class CurrentConditions
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

class WeatherData
{
    private $temperatrue;
    private $pressure;
    private $humidity;

    private $currentConditions;

    public function __construct(CurrentConditions $currentConditions)
    {
        $this->currentConditions = $currentConditions;
    }

    public function dataChange()
    {
        $this->currentConditions->update($this->temperatrue, $this->pressure, $this->humidity);
    }

    public function setData($temperatrue, $pressure, $humidity)
    {
        $this->temperatrue = $temperatrue;
        $this->pressure = $pressure;
        $this->humidity = $humidity;

        $this->dataChange();
    }

    public function getTemperatrue()
    {
        return $this->temperatrue;
    }

    public function getPressure()
    {
        return $this->pressure;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }
}

$c = new CurrentConditions();
$w = new WeatherData($c);
$w->setData(10, 20, 30);

echo '------- data change -------'.PHP_EOL;
$w->setData(40, 50, 60);
