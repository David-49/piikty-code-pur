<?php include('header.php') ?>
<?php
if (!isset($_SESSION['loginsession'])) {
    header('Location: index.php');
}
?>
<?php include('traitement/traitement-ajout-produit.php') ?>

<?php

// $login = $_SESSION['loginsession'];
// $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail= '$login'");
// $reqS -> execute();
//
// while ($ligne = $reqS -> fetch()) {
//     $id = $ligne -> id;
// }
//
// $reqS -> closeCursor();


// $reqS = $connection -> prepare("SELECT * FROM piikti_produit WHERE id_utilisateur = '$id'");
// $reqS -> execute();
//
// if ($reqS -> rowCount() == 1) {
//     while ($ligne = $reqS -> fetch()) {
//         $nomProduit = $ligne -> nom_produit;
//         $descProduit = $ligne -> desc_produit;
//         $prixProduit = $ligne -> prix_produit;
//         $catProduit= $ligne -> cat_produit;
//         $tailleS = $ligne -> tailleS;
//         $tailleM = $ligne -> tailleM;
//         $tailleL = $ligne -> tailleL;
//         $pathPhoto = $ligne -> chemin_photo_produit;
//     }
// } else {
//     $nomProduit = "";
//     $descProduit  = "";
//     $prixProduit = "";
//     $catProduit = "";
//     $pathPhoto = "";
//     $tailleS = "";
//     $tailleM = "";
//     $tailleL = "";
// }

?>



<h1 class="titreAjoutProduit"><?php echo strtoupper('partager') ?></h1>
<div class="containerAjoutProduit">

    <form class="formAjoutProduit"  method="post" enctype="multipart/form-data">

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



<?php include('footer.php') ?>
