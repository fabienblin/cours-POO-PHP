<?php

abstract class Animal {
    public $sexe;
    public $nom;

    public function __construct($sexe, $nom)
    {
        if ($sexe != "f" || $sexe != "m"){
            $this->sexe = "f";
        }
        $this->sexe = $sexe;
        $this->nom = $nom;
    }

    public function manger(Animal $nourriture){
        echo "Je suis un {$this->nom} qui mange un {$nourriture->nom}<br>";
    }
}

class Oiseau extends Animal{
    public $plumes;

    public function __construct($sexe, $nom){
        parent::__construct($sexe, $nom);
    }

    public function pondre(){
        if($this->sexe == "f"){
            echo "Je suis un {$this->nom} qui pond<br>";
        }
        else {
            echo "Je suis un {$this->nom} mâle, je ne peux pas pondre<br>";
        }
    }
}

class Mamifere extends Animal{
    public $poils;

    public function __construct($sexe, $nom){
        parent::__construct($sexe, $nom);
    }

    public function tete(){
        if($this->sexe == "f"){
            echo "Je suis un {$this->nom} qui donne la tété<br>";
        }
        else {
            echo "Je suis un {$this->nom} mâle, je ne peux pas donner la tété<br>";
        }
    }
}




$aigle = new Oiseau("f", "aigle");
$lapin = new Mamifere("m", "lapin");

$lapin->tete();
$aigle->pondre();

$aigle->manger($lapin);