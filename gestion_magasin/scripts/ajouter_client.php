<?php
require '../includes/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $client = new Client();
    $client->setNom($nom);
    $client->setEmail($email);
    $client->sauvegarder();

    echo "Client ajouté avec succès !";
    echo '<br><a href="../index.php" class="btn">Retour à l\'accueil</a>';
}
?>
