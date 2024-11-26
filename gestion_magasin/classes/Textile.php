<?php
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

    public function sauvegarder() {
        parent::sauvegarder();
        // Ajouter la logique pour sauvegarder la taille
    }
}
