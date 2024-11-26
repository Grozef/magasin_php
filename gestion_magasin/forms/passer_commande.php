<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Passer une Commande</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Passer une Commande</h1>
    <form action="../scripts/passer_commande.php" method="post">
        <label for="client_id">Client :</label>
        <select id="client_id" name="client_id" required>
            <?php
            require '../includes/autoload.php';
            $clients = Client::getTousLesClients();
            foreach ($clients as $client) {
                echo "<option value='{$client['id']}'>{$client['nom']}</option>";
            }
            ?>
        </select><br>

        <label for="produit_id">Produit :</label>
        <select id="produit_id" name="produit_id" required>
            <?php
            $produits = Produit::getTousLesProduits();
            foreach ($produits as $produit) {
                echo "<option value='{$produit['id']}'>{$produit['nom']}</option>";
            }
            ?>
        </select><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <button type="submit">Ajouter à la Commande</button>
    </form>
    <br>
    <a href="../index.php">Retour à l'accueil</a>
</body>
</html>
