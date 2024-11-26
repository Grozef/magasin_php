<?php
require '../includes/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $categorie = $_POST['categorie'];

    switch ($categorie) {
        case 'Alimentaire':
            $produit = new Alimentaire();
            $produit->setDateExpiration($_POST['date_expiration']);
            break;
        case 'Textile':
            $produit = new Textile();
            $produit->setTaille($_POST['taille']);
            break;
        case 'Electromenager':
            $produit = new Electromenager();
            $produit->setGarantie($_POST['garantie']);
            break;
        default:
            $produit = new Produit();
    }

    $produit->setNom($nom);
    $produit->setPrix($prix);
    $produit->setQuantite($quantite);
    $produit->setCategorie($categorie);
    $produit->sauvegarder();

    echo "Produit ajouté avec succès !";
    header("refresh:2;url=../index.php");
}
?>
