<?php
require_once '../config/config.php';
require_once '../src/controllers/ClientController.php';

$clients = ClientController::afficherClients();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>

    <h1>Liste des Clients</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['nom']) ?></td>
                    <td><?= htmlspecialchars($client['email']) ?></td>
                    <td><?= htmlspecialchars($client['telephone']) ?></td>
                    <td>
                        <a href="modifier_client.php?id=<?= $client['id'] ?>">Modifier</a>
                        <a href="supprimer_client.php?id=<?= $client['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include '../templates/footer.php'; ?>
</body>
</html>
