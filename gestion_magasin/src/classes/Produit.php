<?php
class Produit {
    private $id;
    private $nom;
    private $prix;
    private $quantite;
    private $categorie;

    public function __construct($id = null) {
        if ($id) {
            $this->charger($id);
        }
    }

    private function charger($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        $produit = $stmt->fetch();

        $this->id = $produit['id'];
        $this->nom = $produit['nom'];
        $this->prix = $produit['prix'];
        $this->quantite = $produit['quantite'];
        $this->categorie = $produit['categorie'];
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function sauvegarder() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE produits SET nom = ?, prix = ?, quantite = ?, categorie = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->prix, $this->quantite, $this->categorie, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, quantite, categorie) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->nom, $this->prix, $this->quantite, $this->categorie]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public static function getTousLesProduits() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
