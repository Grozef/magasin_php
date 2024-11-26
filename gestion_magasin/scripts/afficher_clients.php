<?php
require '../includes/autoload.php';

$clients = Client::getTousLesClients();

if (isset($_GET['action']) && $_GET['action'] == 'delete_client') {
    $id = $_GET['id'];
    $client = Client::getClientParId($id);
    if ($client) {
        $client->supprimer();
    }
    header('Location: afficher_clients.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Afficher les Clients</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Clients</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo $client['id']; ?></td>
                <td><?php echo $client['nom']; ?></td>
                <td><?php echo $client['email']; ?></td>
                <td>
                    <a href="?action=delete_client&id=<?php echo $client['id']; ?>" class="btn btn-danger">Supprimer</a>
                    <a href="modifier_client.php?id=<?php echo $client['id']; ?>" class="btn">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php" class="btn">Retour à l'accueil</a>
</body>
</html>
