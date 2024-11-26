<?php
class Commande {
    private $id;
    private $client;
    private $dateCommande;
    private $produits;
    private $pdo;

    public function __construct($id = null) {
        $this->pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        if ($id) {
            $this->chargerCommande($id);
        }
    }

    private function chargerCommande($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM commandes WHERE id = ?");
        $stmt->execute([$id]);
        $commande = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($commande) {
            $this->id = $commande['id'];
            $this->client = Client::getClientParId($commande['client_id']);
            $this->dateCommande = $commande['date_commande'];
            $this->produits = $this->getProduitsCommande($id);
        }
    }

    private function getProduitsCommande($commande_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM commande_produits WHERE commande_id = ?");
        $stmt->execute([$commande_id]);
        $produits = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produit = Produit::getProduitParId($row['produit_id']);
            $produits[] = ['produit' => $produit, 'quantite' => $row['quantite']];
        }
        return $produits;
    }

    public static function getToutesLesCommandes() {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        $stmt = $pdo->query("SELECT * FROM commandes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ajouterProduit($produit, $quantite) {
        $this->produits[] = ['produit' => $produit, 'quantite' => $quantite];
    }

    public function sauvegarder() {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE commandes SET client_id = ?, date_commande = ? WHERE id = ?");
            $stmt->execute([$this->client->getId(), $this->dateCommande, $this->id]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO commandes (client_id, date_commande) VALUES (?, ?)");
            $stmt->execute([$this->client->getId(), $this->dateCommande]);
            $this->id = $this->pdo->lastInsertId();
        }

        $stmt = $this->pdo->prepare("DELETE FROM commande_produits WHERE commande_id = ?");
        $stmt->execute([$this->id]);

        foreach ($this->produits as $produit) {
            $stmt = $this->pdo->prepare("INSERT INTO commande_produits (commande_id, produit_id, quantite) VALUES (?, ?, ?)");
            $stmt->execute([$this->id, $produit['produit']->getId(), $produit['quantite']]);
        }
    }

    public function supprimer() {
        $stmt = $this->pdo->prepare("DELETE FROM commande_produits WHERE commande_id = ?");
        $stmt->execute([$this->id]);

        $stmt = $this->pdo->prepare("DELETE FROM commandes WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public function getTotalCommande() {
        $total = 0;
        foreach ($this->produits as $produit) {
            $total += $produit['produit']->getPrix() * $produit['quantite'];
        }
        return $total;
    }

    // Getters et Setters
    public function getId() { return $this->id; }
    public function getClient() { return $this->client; }
    public function getDateCommande() { return $this->dateCommande; }
    public function getProduits() { return $this->produits; }

    public function setClient($client) { $this->client = $client; }
    public function setDateCommande($dateCommande) { $this->dateCommande = $dateCommande; }
}
