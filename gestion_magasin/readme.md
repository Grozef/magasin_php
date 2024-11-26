# Gestionnaire de Magasin

Ce projet est une application de gestion de magasin en PHP orienté objet avec une base de données MySQL. Il permet de gérer les produits, les clients et les commandes.

## Structure du Projet

- `classes/` : Contient les fichiers de classes PHP pour les produits, les clients et les commandes.
- `includes/` : Contient les fichiers d'inclusion, comme l'autoloader.
- `forms/` : Contient les formulaires HTML pour ajouter des produits, des clients et passer des commandes.
- `scripts/` : Contient les scripts PHP pour traiter les formulaires et afficher les détails des commandes.
- `index.php` : Page d'accueil pour naviguer entre les différentes fonctionnalités du gestionnaire de magasin.
- `db/` : Contient les fichiers SQL pour créer la base de données et les tables.
- `css/` : Contient les fichiers CSS pour le style de l'interface web.
- `js/` : Contient les fichiers JavaScript pour ajouter des fonctionnalités interactives à l'interface web.
- `README.md` : Fichier de documentation pour le projet.

## Installation

1. Créez la base de données et les tables en exécutant le script SQL dans le dossier `db/`.
2. Placez les fichiers du projet dans votre serveur web.
- clonez ou copiez le dossier dans le repertoire www de Laragon
- allez a l'emplacement du gestionnaire de magasin avec la commande cd C:\laragon\www\php\gestion_magasin dans le terminal
- ( vous etes qqun de bien,  je sais que vous utilisez laragon sinon faites pareil avec le repertoire htdocs dans xamp)
3. Accédez à `index.php` pour commencer à utiliser l'application:
- lancez le serveur php avec la commande suivante php -S localhost:8000
- ouvrez un navigateur web et allez sur localhost:8000

## Utilisation

- Utilisez les formulaires dans le dossier `forms/` pour ajouter des produits, des clients et passer des commandes.
- Les scripts dans le dossier `scripts/` traitent les données soumises via les formulaires.
- L'autoloader dans le dossier `includes/` charge automatiquement les classes nécessaires.
