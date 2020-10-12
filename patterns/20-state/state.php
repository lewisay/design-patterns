<?php

abstract class State
{
    public abstract function deductMoney();
    public abstract function raffle();
    public abstract function dispensePrize();
}

class NoRaffleState extends State
{
    private $activity;

    public function __construct(RaffleActivity $activity)
    {
        $this->activity = $activity;
    }

    public function deductMoney()
    {
        echo '扣除 5 积分成功，您可以抽奖了'.PHP_EOL;
        $this->activity->setState($this->activity->getCanRaffleState());
    }

    public function raffle()
    {
        echo '扣了积分才能抽奖'.PHP_EOL;
        return false;
    }

    public function dispensePrize()
    {
        echo '不能发放奖品'.PHP_EOL;
    }
}

class CanRaffleState extends State
{
    private $activity;

    public function __construct(RaffleActivity $activity)
    {
        $this->activity = $activity;
    }

    public function deductMoney()
    {
       echo "已经扣取过了积分".PHP_EOL;
    }

    public function raffle()
    {
        echo '正在抽奖，请稍等!'.PHP_EOL;

        $v = mt_rand();
        if ($v % 2 == 0) {
            echo '准备发放奖品!'.PHP_EOL;
            $this->activity->setState($this->activity->getDispenseState());
            return true;
        }

        echo '很遗憾没有抽中奖品!'.PHP_EOL;
        $this->activity->setState($this->activity->getNoRaffleState());
        return false;
    }

    public function dispensePrize()
    {
        echo '没中奖，不能发放奖品!'.PHP_EOL;
    }
}


class DispenseState extends State
{
    private $activity;

    public function __construct(RaffleActivity $activity)
    {
        $this->activity = $activity;
    }

    public function deductMoney()
    {
        echo '不能扣除积分'.PHP_EOL;
    }

    public function raffle()
    {
        echo '不能抽奖'.PHP_EOL;
        return false;
    }

    public function dispensePrize()
    {
        $message = '';
        if ($this->activity->count() > 0) {
            $message = '恭喜中奖了';
            $this->activity->setState($this->activity->getNoRaffleState());
        } else {
            $message = '很遗憾，奖品发送完了';
            $this->activity->setState($this->activity->getDispensOutState());
        }

        echo $message.PHP_EOL;
    }
}

class DispenseOutState extends State
{
    private $activity;

    public function __construct(RaffleActivity $activity)
    {
        $this->activity = $activity;
    }

    public function deductMoney()
    {
        echo '奖品发送完了，请下次再参加!'.PHP_EOL;
    }

    public function raffle()
    {
        echo '奖品发送完了，请下次再参加!'.PHP_EOL;
        return false;
    }

    public function dispensePrize()
    {
        echo '奖品发送完了，请下次再参加!'.PHP_EOL;
    }
}

class RaffleActivity
{
    private $state;
    private $count;

    private $noRaffleState;
    private $canRaffleState;
    private $dispenseState;
    private $dispensOutState;

    public function __construct($count)
    {
        $this->noRaffleState = new NoRaffleState($this);
        $this->canRaffleState = new CanRaffleState($this);
        $this->dispenseState = new DispenseState($this);
        $this->dispensOutState = new DispenseOutState($this);

        $this->state = $this->getNoRaffleState();
        $this->count = $count;
    }

    public function deductMoney()
    {
        $this->state->deductMoney();
    }

    public function raffle()
    {
        if ($this->state->raffle()) {
            $this->state->dispensePrize();
        }
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function count()
    {
        $curCount = $this->count;
        $this->count--;
        return $curCount;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getNoRaffleState()
    {
        return $this->noRaffleState;
    }

    public function getCanRaffleState()
    {
        return $this->canRaffleState;
    }

    public function getDispenseState()
    {
        return $this->dispenseState;
    }

    public function getDispensOutState()
    {
        return $this->dispensOutState;
    }
}

$activity = new RaffleActivity(1);
for ($i = 0; $i < 10; $i++) {
    echo '--------第 ('.($i + 1).') 次抽奖----------'.PHP_EOL;
    $activity->deductMoney();
    $activity->raffle();
}
