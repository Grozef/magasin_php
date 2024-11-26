<?php
class Alimentaire extends Produit {
    private $date_expiration;

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function setDateExpiration($date_expiration) {
        $this->date_expiration = $date_expiration;
    }

    public function getDateExpiration() {
        return $this->date_expiration;
    }

    public function sauvegarder() {
        parent::sauvegarder();
        // Ajouter la logique pour sauvegarder la date d'expiration
    }
}
