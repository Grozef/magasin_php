<?php
require_once __DIR__ . '/../classes/Client.php';

class ClientController {

    public static function afficherClients() {
        return Client::getTousLesClients();
    }

    public static function ajouterClient($nom, $email, $telephone) {
        $client = new Client();
        $client->setNom($nom);          
        $client->setEmail($email);  
        $client->setTelephone($telephone);
        $client->sauvegarder();
    }

    public static function supprimerClient($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
