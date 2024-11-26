<?php

require_once 'Produit.php';  

class Textile extends Produit {
    private $taille;

    public function __construct($id = null) {
        parent::__construct($id); 
    }

    public function setTaille($taille) {
        $this->taille = $taille;
    }

    public function getTaille() {
        return $this->taille;
    }
}
