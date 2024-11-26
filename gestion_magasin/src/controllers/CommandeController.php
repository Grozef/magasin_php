<?php
require_once __DIR__ . '/../classes/Commande.php';

class CommandeController {
    public static function afficherCommandes() {
        return Commande::getToutesLesCommandes();
    }

    public static function ajouterCommande($client_id, $date, $total) {
        $commande = new Commande();
        $commande->setClientId($client_id);  
        $commande->setDate($date);           
        $commande->setTotal($total); 
        $commande->sauvegarder();
    }

    public static function supprimerCommande($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM commandes WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
