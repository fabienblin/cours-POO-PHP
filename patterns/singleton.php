<?php

// https://fr.wikipedia.org/wiki/Singleton_(patron_de_conception)

class Config{
    private static $data;
    private static $_instance; // attibut statique

    // constructeur privé
    private function __construct()
    {
        self::$data = 1;
    }

    // méthode statique car cette classe ne peut être instanciée
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config();
            echo "Init Config : data=".self::$data."<br>";
        }
        return self::$_instance;
    }
}

print_r(Config::getInstance());
echo"<br>";
print_r(Config::getInstance());
echo"<br>";