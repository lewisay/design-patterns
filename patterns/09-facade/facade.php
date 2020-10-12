<?php

class DVDPlayer
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function play()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function pause()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Popcorn
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function pop()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Projector
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function focus()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Screen
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function up()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function down()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class Stereo
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function up()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class TheaterLight
{
    public static function getInstance()
    {
        static $ins = null;
        if ($ins === null) {
            $ins = new self();
        }
        return $ins;
    }

    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function bright()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function dim()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class HomeTheaterFacade
{
    private $theaterLight;
    private $popcorn;
    private $stereo;
    private $projector;
    private $screen;
    private $dvdplayer;

    public function __construct()
    {
        $this->theaterLight = TheaterLight::getInstance();
        $this->popcorn = Popcorn::getInstance();
        $this->stereo = Stereo::getInstance();
        $this->projector = Projector::getInstance();
        $this->screen = Screen::getInstance();
        $this->dvdplayer = DVDPlayer::getInstance();
    }

    public function ready()
    {
        $this->popcorn->on();
        $this->popcorn->pop();
        $this->screen->down();
        $this->projector->on();
        $this->stereo->on();
        $this->dvdplayer->on();
        $this->theaterLight->dim();
    }

    public function play()
    {
        $this->dvdplayer->play();
    }

    public function pause()
    {
        $this->dvdplayer->pause();
    }

    public function end()
    {
        $this->popcorn->off();
        $this->theaterLight->bright();
        $this->screen->up();
        $this->projector->off();
        $this->stereo->off();
        $this->dvdplayer->off();
    }
}

$f = new HomeTheaterFacade();
$f->ready();
$f->play();
$f->pause();
$f->end();