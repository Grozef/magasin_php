<?php
require '../includes/autoload.php';

if (isset($_GET['commande_id'])) {
    $commande_id = $_GET['commande_id'];
    $commande = new Commande($commande_id);

    echo "<h1>Détails de la Commande</h1>";
    echo "<p>Client : " . $commande->getClient()->getNom() . "</p>";
    echo "<p>Date de commande : " . $commande->getDateCommande() . "</p>";
    echo "<p>Produits :</p>";
    echo "<ul>";
    foreach ($commande->getProduits() as $item) {
        $produit = $item['produit'];
        $quantite = $item['quantite'];
        echo "<li>{$produit->getNom()} (Quantité : {$quantite})</li>";
    }
    echo "</ul>";
    echo "<p>Total de la commande : " . ($commande->getTotalCommande() / 100) . " €</p>";
    echo "<a href='../index.php' class='btn'>Retour à l'accueil</a>";
} else {
    echo "<form method='get' action='afficher_commande.php'>";
    echo "<label for='commande_id'>Sélectionnez l'ID de la commande :</label>";
    echo "<select name='commande_id' id='commande_id'>";

    $commandes = Commande::getToutesLesCommandes();
    foreach ($commandes as $commande) {
        echo "<option value='{$commande['id']}'>{$commande['id']}</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Afficher la Commande' class='btn'>";
    echo "</form>";
    echo "<a href='../index.php' class='btn'>Retour à l'accueil</a>";
}
?>
