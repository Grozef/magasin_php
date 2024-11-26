<?php
require '../includes/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    $client = new Client($client_id);
    $produit = new Produit($produit_id);

    $commande = new Commande();
    $commande->setClient($client);
    $commande->setDateCommande(date('Y-m-d H:i:s'));
    $commande->ajouterProduit($produit, $quantite);
    $commande->sauvegarder();

    echo "Commande passée avec succès !";
    echo '<br><a href="../index.php" class="btn">Retour à l\'accueil</a>';

    echo "<h2>Détails de la Commande</h2>";
    echo "<p>Client : " . $commande->getClient()->getNom() . "</p>";
    echo "<p>Date de commande : " . $commande->getDateCommande() . "</p>";
    echo "<p>Produits :</p>";
    echo "<ul>";
    foreach ($commande->getProduits() as $produit) {
        echo "<li>{$produit['produit']->getNom()} (Quantité : {$produit['quantite']})</li>";
    }
    echo "</ul>";
    echo "<p>Total de la commande : " . ($commande->getTotalCommande() / 100) . " €</p>";
}
?>
