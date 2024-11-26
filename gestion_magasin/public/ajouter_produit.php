<?php
require_once '../config/config.php';
require_once '../src/classes/Produit.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traite le formulaire si soumis
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $categorie = $_POST['categorie'];

    // Créer un objet produit
    $produit = new Produit();
    $produit->setNom($nom);
    $produit->setPrix($prix);
    $produit->setQuantite($quantite);
    $produit->setCategorie($categorie);
    
    // Sauvegarder le produit dans la base de données
    $produit->sauvegarder();

    // Message de confirmation après soumission
    echo "<p>Produit ajouté avec succès!</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>

<h1>Ajouter un produit</h1>

<form action="ajouter_produit.php" method="POST">
    <label for="nom">Nom du produit:</label>
    <input type="text" name="nom" id="nom" required><br><br>

    <label for="prix">Prix:</label>
    <input type="number" name="prix" id="prix" required><br><br>

    <label for="quantite">Quantité:</label>
    <input type="number" name="quantite" id="quantite" required><br><br>

    <label for="categorie">Catégorie:</label>
    <select name="categorie" id="categorie">
        <option value="Alimentaire">Alimentaire</option>
        <option value="Textile">Textile</option>
        <option value="Electromenager">Electroménager</option>
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
