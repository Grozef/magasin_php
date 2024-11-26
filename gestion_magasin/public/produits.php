<?php
require_once '../config/config.php';
require_once '../src/controllers/ProduitController.php';

$produits = ProduitController::afficherProduits();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produits</title>
</head>
<body>
    <h1>Liste des Produits</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td><?= htmlspecialchars($produit['nom']) ?></td>
                    <td><?= number_format($produit['prix'] / 100, 2) ?> €</td>
                    <td><?= htmlspecialchars($produit['quantite']) ?></td>
                    <td><?= htmlspecialchars($produit['categorie']) ?></td>
                    <td>
                        <a href="modifier_produit.php?id=<?= $produit['id'] ?>">Modifier</a>
                        <a href="supprimer_produit.php?id=<?= $produit['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
