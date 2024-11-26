<form action="ajouter_produit.php" method="post">
    <label for="nom">Nom du produit :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prix">Prix (en euros) :</label>
    <input type="number" id="prix" name="prix" step="0.01" required>

    <label for="quantite">Quantité :</label>
    <input type="number" id="quantite" name="quantite" required>

    <label for="categorie">Catégorie :</label>
    <select id="categorie" name="categorie" onchange="afficherAttributsSpecifiques()" required>
        <option value="">Sélectionnez une catégorie</option>
        <option value="Alimentaire">Alimentaire</option>
        <option value="Textile">Textile</option>
        <option value="Electromenager">Électroménager</option>
    </select>

    <div id="attribut_alimentaire" style="display: none;">
        <label for="date_expiration">Date d'expiration :</label>
        <input type="date" id="date_expiration" name="date_expiration">
    </div>

    <div id="attribut_textile" style="display: none;">
        <label for="taille">Taille :</label>
        <input type="text" id="taille" name="taille">
    </div>

    <div id="attribut_electromenager" style="display: none;">
        <label for="garantie">Durée de garantie (en mois) :</label>
        <input type="number" id="garantie" name="garantie">
    </div>

    <button type="submit">Enregistrer le produit</button>
</form>

<script>
    function afficherAttributsSpecifiques() {

        document.getElementById('attribut_alimentaire').style.display = 'none';
        document.getElementById('attribut_textile').style.display = 'none';
        document.getElementById('attribut_electromenager').style.display = 'none';


        const categorie = document.getElementById('categorie').value;
        if (categorie === 'Alimentaire') {
            document.getElementById('attribut_alimentaire').style.display = 'block';
        } else if (categorie === 'Textile') {
            document.getElementById('attribut_textile').style.display = 'block';
        } else if (categorie === 'Electromenager') {
            document.getElementById('attribut_electromenager').style.display = 'block';
        }
    }
</script>
