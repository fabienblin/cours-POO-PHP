<?php

// https://fr.wikipedia.org/wiki/Fabrique_(patron_de_conception)

class Voiture
{
    private $marque;

    public function __construct($marque)
    {
        $this->marque = $marque;
    }

    public function getName()
    {
        return 'Voiture ' . $this->marque;
    }
}

class VoitureFactory
{
    public static function create($marque)
    {
        echo "create {$marque}<br>";
        return new Voiture($marque);
    }
}

$twingo = VoitureFactory::create('Twingo');
$c3 = VoitureFactory::create('C3');