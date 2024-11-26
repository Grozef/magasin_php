<?php
class Electromenager extends Produit {
    private $garantie;

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function setGarantie($garantie) {
        $this->garantie = $garantie;
    }

    public function getGarantie() {
        return $this->garantie;
    }

    public function sauvegarder() {
        parent::sauvegarder();
        // Ajouter la logique pour sauvegarder la garantie
    }
}
