<?php
namespace PPI\PlatesModule;

use League\Plates\Engine as BaseEngine;
use League\Plates\Template\Name as DefaultNameFactory;
use PPI\PlatesModule\PlatesEngine\Template\NameFactory;

class PlatesEngine extends BaseEngine
{

    protected $nameFactory;

    public function path($name)
    {
        $name = $this->getNameFactory()->create($this, $name);
        return $name->getPath();
    }

    public function exists($name)
    {
        $name = $this->getNameFactory()->create($this, $name);
        return $name->doesPathExist();
    }

    public function setNameFactory(PlatesNameFactory $nameFactory)
    {
        $this->nameFactory = $nameFactory;
    }

    public function getNameFactory()
    {
        if($this->nameFactory === null) {
            return new DefaultNameFactory();
        }
        return $this->nameFactory;
    }
}