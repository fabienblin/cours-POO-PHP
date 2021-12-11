<?php

abstract class User{
    private $login;
    private $password;

    public function login($login, $password){
        echo "User {$this->login} is connected<br>";
    }
}

class Admin extends User{
    // surcharge
    public function login($login, $password){
        echo "Admin {$login} is connected<br>";
    }
}

class Subscriber extends User{
    // surcharge
    public function login($login, $password){
        echo "Subscriber {$login} is connected<br>";
    }
}

$admin = new Admin();
$subscriber = new Subscriber();

$admin->login("Fabien", "password");
$subscriber->login("Lise", "password");