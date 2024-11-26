<?php
class Client {
    private $id;
    private $nom;
    private $email;
    private $telephone;

    public function __construct($id = null) {
        if ($id) {
            $this->charger($id);
        }
    }

    private function charger($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $client = $stmt->fetch();

        $this->id = $client['id'];
        $this->nom = $client['nom'];
        $this->email = $client['email'];
        $this->telephone = $client['telephone'];
    }

    public function sauvegarder() {
        global $pdo;
        if ($this->id) {

            $stmt = $pdo->prepare("UPDATE clients SET nom = ?, email = ?, telephone = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->email, $this->telephone, $this->id]);
        } else {

            $stmt = $pdo->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
            $stmt->execute([$this->nom, $this->email, $this->telephone]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public static function getTousLesClients() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
}
?>
