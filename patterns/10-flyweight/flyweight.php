<?php

abstract class WebSite
{
    public abstract function use(User $user);
}

class ConcreteWebSite extends WebSite
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function use(User $user)
    {
        echo __METHOD__.':'.$this->type.':'.$user->getName().PHP_EOL;
    }
}

class WebSiteFactory
{
    private $websites;

    public function get($type)
    {
        if (!isset($this->websites[$type])) {
            $this->websites[$type] = new ConcreteWebSite($type);
        }

        return $this->websites[$type];
    }

    public function count()
    {
        return count($this->websites);
    }
}

class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$f = new WebSiteFactory();
$website = $f->get('news');
$website->use(new User('Tom'));

echo '----------'.PHP_EOL;
$website = $f->get('blog');
$website->use(new User('Jerry'));

echo '----------'.PHP_EOL;
$website = $f->get('news');
$website->use(new User('LiLei'));

echo '----------'.PHP_EOL;
echo $f->count().PHP_EOL;