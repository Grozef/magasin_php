<?php
class Produit {
    protected $id;
    protected $nom;
    protected $prix;
    protected $quantite;
    protected $categorie;
    protected $pdo;

    public function __construct($id = null) {
        $this->pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        if ($id) {
            $this->chargerProduit($id);
        }
    }

    private function chargerProduit($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($produit) {
            $this->id = $produit['id'];
            $this->nom = $produit['nom'];
            $this->prix = $produit['prix'];
            $this->quantite = $produit['quantite'];
            $this->categorie = $produit['categorie'];
        }
    }

    public function sauvegarder() {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE produits SET nom = ?, prix = ?, quantite = ?, categorie = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->prix, $this->quantite, $this->categorie, $this->id]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO produits (nom, prix, quantite, categorie) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->nom, $this->prix, $this->quantite, $this->categorie]);
            $this->id = $this->pdo->lastInsertId();
        }
    }

    public function mettreAJourQuantite($quantite) {
        $this->quantite = $quantite;
        $stmt = $this->pdo->prepare("UPDATE produits SET quantite = ? WHERE id = ?");
        $stmt->execute([$this->quantite, $this->id]);
    }

    public function supprimer() {
        $stmt = $this->pdo->prepare("DELETE FROM produits WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public static function getProduitParId($id) {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($produit) {
            return new Produit($id);
        }
        return null;
    }
    public static function getTousLesProduits() {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
        $stmt = $pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getters et Setters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrix() { return $this->prix; }
    public function getQuantite() { return $this->quantite; }
    public function getCategorie() { return $this->categorie; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setPrix($prix) { $this->prix = $prix; }
    public function setQuantite($quantite) { $this->quantite = $quantite; }
    public function setCategorie($categorie) { $this->categorie = $categorie; }
}
