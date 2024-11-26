<?php

require_once 'Produit.php';  

class Alimentaire extends Produit {
    private $date_expiration;

    public function __construct($id = null) {
        parent::__construct($id);  
    }

    public function setDateExpiration($date) {
        $this->date_expiration = $date;
    }

    public function getDateExpiration() {
        return $this->date_expiration;
    }
}
