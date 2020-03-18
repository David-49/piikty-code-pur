<?php session_start(); ?>
<?php
if (!isset($_SESSION['idsession'])) {
    header('Location: index.php');
    exit;
}

//initialisation variable message log
if (isset($_SESSION['enregistrer'])) {
    $enregistrer = $_SESSION['enregistrer'];
} else {
    $enregistrer = "";
}

if (isset($_SESSION['erreurProduit'])) {
    $erreurProduit = $_SESSION['erreurProduit'];
} else {
    $erreurProduit = "";
}

?>
<?php include('header.php'); ?>

<h1 class="titreAjoutProduit"><?php echo strtoupper('partager') ?></h1>
<div class="containerAjoutProduit">

    <form class="formAjoutProduit" action="traitement/traitement-ajout-produit.php"  method="post" enctype="multipart/form-data">

    <div class="blocGaucheProduit">

        <div class="blocChoixProduit">
            <label for="nom-produit">Nom du produit</label>
            <input type="text" name="nomProduit" required>
        </div>

        <div class="blocChoixProduit">
            <label for="desc-produit">Description du produit</label>
            <textarea name="descProduit" rows="8" cols="80" required></textarea>
        </div>

        <div class="blocChoixProduit">
            <label for="prix-produit">Prix (€)</label>
            <input type="number" name="prixProduit" step="any" min="0" required>
        </div>

        <button type="submit" name="buttonProduit" class="boutonProduit"><?php echo strtoupper('publier') ?></button>
    </div>

    <div class="separationVetical"></div>

    <div class="blocDroitProduit">

        <div class="blocChoixProduit">
            <label for="sexe-produit">Homme/Femme</label>
            <select class="" name="sexeProduit" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>
        <div class="blocChoixProduit">
            <label for="cat-produit">Catégorie</label>
            <select class="" name="catProduit" required>
                <option value="manteaux_blousons">Manteaux/Blousons</option>
                <option value="pull">Pull</option>
                <option value="chemises">Chemises</option>
                <option value="pulls">T-shirts</option>
                <option value="t_shirts">Pantalons</option>
                <option value="accessoires">Accessoires</option>
            </select>
        </div>

        <div class="blocChoixProduit">
            <p class="taille-produit">Taille</p>
            <div class="blocRadio">
                <p class="containerRadio">
                    <input type="checkbox" name="tailleS" value="S" class="radioTaille radioS" id="taille-S">
                    <label for="taille-S" class="labelRadio label-S"></label>
                </p>
                <p class="containerRadio">
                    <input type="checkbox" name="tailleM" value="M" class="radioTaille radioM" id="taille-M">
                    <label for="taille-M" class="labelRadio label-M"></label>
                </p>
                <p class="containerRadio">
                    <input type="checkbox" name="tailleL" value="L" class="radioTaille radioL" id="taille-L">
                    <label for="taille-L" class="labelRadio label-L"></label>
                </p>
            </div>
        </div>
        <div class="containerPhotoProduit">
            <div class="blocInputPhotoProduit">
                <label for="photo" tabindex="0" class="labelProduitPhoto">Joindre une image</label>
                <input type="file" name="photoProduitInpt" accept="image/jpeg" runat="server" id="imgInptProduit" class="inputProduitPhoto"  required>
            </div>

            <div class="blocImageProduit">
                <img src="" id="photoProduit" alt="photo de votre produit" class="ajoutPhotoProduit">
            </div>

        </div>


    </div>

    </form>

    <div class="msgLogProduit">
        <div class="msgPositif">
            <?php echo $enregistrer; ?>
        </div>
        <div class="msgNegatif">
            <?php echo $erreurProduit; ?>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>
