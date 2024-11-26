<?php
require_once '../config/config.php';
require_once '../src/controllers/CommandeController.php';

$commandes = CommandeController::afficherCommandes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Commandes</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>

    <h1>Liste des Commandes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Client</th>
                <th>Date</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande): ?>
                <tr>
                    <td><?= htmlspecialchars($commande['client_nom']) ?></td>
                    <td><?= htmlspecialchars($commande['date']) ?></td>
                    <td><?= number_format($commande['total'] / 100, 2) ?> €</td>
                    <td>
                        <a href="modifier_commande.php?id=<?= $commande['id'] ?>">Modifier</a>
                        <a href="supprimer_commande.php?id=<?= $commande['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include '../templates/footer.php'; ?>
</body>
</html>
