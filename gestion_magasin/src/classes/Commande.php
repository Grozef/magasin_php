<?php
class Commande {
    private $id;
    private $client_id;
    private $date;
    private $total;

    public function __construct($id = null) {
        if ($id) {
            $this->charger($id);
        }
    }

    private function charger($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM commandes WHERE id = ?");
        $stmt->execute([$id]);
        $commande = $stmt->fetch();

        $this->id = $commande['id'];
        $this->client_id = $commande['client_id'];
        $this->date = $commande['date'];
        $this->total = $commande['total'];
    }

    public function setClientId($client_id) {
        $this->client_id = $client_id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function sauvegarder() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE commandes SET client_id = ?, date = ?, total = ? WHERE id = ?");
            $stmt->execute([$this->client_id, $this->date, $this->total, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO commandes (client_id, date, total) VALUES (?, ?, ?)");
            $stmt->execute([$this->client_id, $this->date, $this->total]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public static function getToutesLesCommandes() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM commandes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
