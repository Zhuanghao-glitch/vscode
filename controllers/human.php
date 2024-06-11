<?php

class human{
    public $sex;
    public $name;

    public function __construct($sex,$name)
    {
        $this->setSex($sex);
        $this->setName($name);
    }

    public function __destruct()
    {
        
    }

    public function setSex($sex){
        $this->sex = $sex;
    }
    public function getSex(){
        echo "性别：".$this->sex;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        echo "姓名：".$this->name;
    }
}

$mike = new human('男','mike');
$mike->getSex();
$mike->getName();