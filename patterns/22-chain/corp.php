<?php

class PurchaseRequest
{
    private $type;
    private $price;
    private $id;

    public function __construct($type, $price, $id)
    {
        $this->type = $type;
        $this->price = $price;
        $this->id = $id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getID()
    {
        return $this->id;
    }
}

abstract class Approver
{
    protected $approver;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setApprover(Approver $approver)
    {
        $this->approver = $approver;
    }

    public abstract function processRequest(PurchaseRequest $request);
}

class DepartmentApprover extends Approver
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function processRequest(PurchaseRequest $request)
    {
        if ($request->getPrice() <= 5000) {
            echo 'id:'.$request->getID().';'.__METHOD__.PHP_EOL;
        } else {
            $this->approver->processRequest($request);
        }
    }
}

class CollegeApprover extends Approver
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function processRequest(PurchaseRequest $request)
    {
        if ($request->getPrice() > 5000 && $request->getPrice() <= 10000) {
            echo 'id:'.$request->getID().';'.__METHOD__.PHP_EOL;
        } else {
            $this->approver->processRequest($request);
        }
    }
}

class ViceSchoolMasterApprover extends Approver
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function processRequest(PurchaseRequest $request)
    {
        if ($request->getPrice() > 10000) {
            echo 'id:'.$request->getID().';'.__METHOD__.PHP_EOL;
        } else {
            $this->approver->processRequest($request);
        }
    }
}

$d = new DepartmentApprover('xm');
$c = new CollegeApprover('xh');
$v = new ViceSchoolMasterApprover('master');

$d->setApprover($c);
$c->setApprover($v);
$v->setApprover($d);

$d->processRequest(new PurchaseRequest(1, 10001, 1));
$d->processRequest(new PurchaseRequest(1, 100, 1));