<?php
class Client {
    private $id;
    private $nom;
    private $email;
    private $pdo;

    public function __construct($id = null) {
        $this->pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        if ($id) {
            $this->chargerClient($id);
        }
    }

    private function chargerClient($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client) {
            $this->id = $client['id'];
            $this->nom = $client['nom'];
            $this->email = $client['email'];
        }
    }

    public function sauvegarder() {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE clients SET nom = ?, email = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->email, $this->id]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO clients (nom, email) VALUES (?, ?)");
            $stmt->execute([$this->nom, $this->email]);
            $this->id = $this->pdo->lastInsertId();
        }
    }

    public function supprimer() {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->execute([$this->id]);
    }
    
    public static function getClientParId($id) {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client) {
            return new Client($id);
        }
        return null;
    }

    public static function getTousLesClients() {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        $stmt = $pdo->query("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getters et Setters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getEmail() { return $this->email; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setEmail($email) { $this->email = $email; }
}
