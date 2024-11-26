<?php
require '../includes/autoload.php';

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];
    $client = Client::getClientParId($client_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $client->setNom($nom);
    $client->setEmail($email);
    $client->sauvegarder();
    header('Location: afficher_clients.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Client</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier le Client</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $client->getNom(); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $client->getEmail(); ?>">
        </div>
        <button type="submit" class="btn">Modifier</button>
    </form>
    <a href="afficher_clients.php" class="btn">Retour à la liste des clients</a>
</body>
</html>
