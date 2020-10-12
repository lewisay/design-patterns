<?php

interface Command
{
    public function execute();
    public function undo();
}

class LightOnCommand implements Command
{
    private $receiver;

    public function __construct(LightReceiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->on();
    }

    public function undo()
    {
        $this->receiver->off();
    }
}

class LightOffCommand implements Command
{
    private $receiver;

    public function __construct(LightReceiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->off();
    }

    public function undo()
    {
        $this->receiver->on();
    }
}

class EmptyCommand implements Command
{
    public function execute()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function undo()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class LightReceiver
{
    public function on()
    {
        echo __METHOD__.PHP_EOL;
    }

    public function off()
    {
        echo __METHOD__.PHP_EOL;
    }
}

class RemoteCtrl
{
    private $onCmds;
    private $offCmds;
    private $undoCmd;

    public function __construct()
    {
        $this->onCmds = [];
        $this->offCmds = [];

        for ($i = 0; $i < 5; $i++) {
            $this->onCmds[$i] = new EmptyCommand();
            $this->offCmds[$i] = new EmptyCommand();
        }
    }

    public function setCmd($num, Command $onCmd, Command $offCmd)
    {
        $this->onCmds[$num] = $onCmd;
        $this->offCmds[$num] = $offCmd;
    }

    public function onBtn($num)
    {
        $cmd = $this->onCmds[$num];
        $cmd->execute();
        $this->undoCmd = $cmd;
    }

    public function offBtn($num)
    {
        $cmd = $this->offCmds[$num];
        $cmd->execute();
        $this->undoCmd = $cmd;
    }

    public function undo()
    {
        $this->undoCmd->undo();
    }
}

$light = new LightReceiver();
$lightOn = new LightOnCommand($light);
$lightOff = new LightOffCommand($light);

$num = 0;
$remote = new RemoteCtrl();
$remote->setCmd($num, $lightOn, $lightOff);

$remote->onBtn($num);
$remote->undo();

$remote->offBtn($num);
$remote->undo();