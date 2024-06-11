<?php

class Us{

    public  $hair = 1;

    public function getName()
    {
        echo self::$hair;
    }
}

class User extends Us{

    public function __construct()
    {
        User::getName();
    }
}
new User();