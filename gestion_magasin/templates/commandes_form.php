<form action="ajouter_commande.php" method="post">
    <label for="client_id">Client :</label>
    <select id="client_id" name="client_id" required>
        <?php foreach (ClientController::afficherClients() as $client): ?>
            <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['nom']) ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="date">Date :</label>
    <input type="date" id="date" name="date" required>
    
    <label for="total">Total :</label>
    <input type="number" id="total" name="total" step="0.01" required>
    
    <button type="submit">Ajouter</button>
</form>
