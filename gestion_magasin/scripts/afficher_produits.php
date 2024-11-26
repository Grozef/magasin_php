<?php
require '../includes/autoload.php';

$produits = Produit::getTousLesProduits();

if (isset($_GET['action']) && $_GET['action'] == 'delete_produit') {
    $id = $_GET['id'];
    $produit = Produit::getProduitParId($id);
    if ($produit) {
        $produit->supprimer();
    }
    header('Location: afficher_produits.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Afficher les Produits</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Produits</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?php echo $produit['id']; ?></td>
                <td><?php echo $produit['nom']; ?></td>
                <td><?php echo $produit['prix']; ?></td>
                <td><?php echo $produit['quantite']; ?></td>
                <td><?php echo $produit['categorie']; ?></td>
                <td>
                    <a href="?action=delete_produit&id=<?php echo $produit['id']; ?>" class="btn btn-danger">Supprimer</a>
                    <a href="modifier_produit.php?id=<?php echo $produit['id']; ?>" class="btn">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php" class="btn">Retour à l'accueil</a>
</body>
</html>
