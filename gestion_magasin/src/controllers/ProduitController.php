<?php
require_once __DIR__ . '/../classes/Produit.php';

class ProduitController {
    public static function afficherProduits() {
        return Produit::getTousLesProduits();
    }

    public static function ajouterProduit($nom, $prix, $quantite, $categorie) {
        $produit = new Produit();
        $produit->setNom($nom);        
        $produit->setPrix($prix);      
        $produit->setQuantite($quantite); 
        $produit->setCategorie($categorie); 
        $produit->sauvegarder();
    }

    public static function supprimerProduit($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
