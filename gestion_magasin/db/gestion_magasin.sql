CREATE DATABASE gestion_magasin;

USE gestion_magasin;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prix INT NOT NULL,
    quantite INT NOT NULL,
    categorie VARCHAR(255) NOT NULL
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    date_commande DATETIME,
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

CREATE TABLE commande_produits (
    commande_id INT,
    produit_id INT,
    quantite INT,
    FOREIGN KEY (commande_id) REFERENCES commandes(id),
    FOREIGN KEY (produit_id) REFERENCES produits(id)
);
