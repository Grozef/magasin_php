<?php
require '../includes/autoload.php';

if (isset($_GET['id'])) {
    $produit_id = $_GET['id'];
    $produit = Produit::getProduitParId($produit_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $categorie = $_POST['categorie'];
    $produit->setNom($nom);
    $produit->setPrix($prix);
    $produit->setQuantite($quantite);
    $produit->setCategorie($categorie);
    $produit->sauvegarder();
    header('Location: afficher_produits.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Produit</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier le Produit</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $produit->getNom(); ?>">
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" id="prix" name="prix" value="<?php echo $produit->getPrix(); ?>">
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="text" id="quantite" name="quantite" value="<?php echo $produit->getQuantite(); ?>">
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" id="categorie" name="categorie" value="<?php echo $produit->getCategorie(); ?>">
        </div>
        <button type="submit" class="btn">Modifier</button>
    </form>
    <a href="afficher_produits.php" class="btn">Retour à la liste des produits</a>
</body>
</html>
