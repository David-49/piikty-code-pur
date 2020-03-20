<?php session_start(); ?>
<?php include('header.php') ?>

<?php

if (isset($_SESSION['idsession'])) {
    $id = $_SESSION['idsession'];
}

if (!empty($_GET['idProduit'])) {
    $idProduit = htmlspecialchars($_GET['idProduit']);
}

$sql = "SELECT
piikti_users.id AS id_createurs, nom, prenom, nom_produit, prix_produit, sexe_produit, chemin_photo_profile, chemin_photo_produit, tailleS, tailleM, tailleL, desc_produit
FROM piikti_users
INNER JOIN piikti_users_meta
    ON piikti_users_meta.id_utilisateur = piikti_users.id
INNER JOIN piikti_produit
    ON piikti_produit.id_utilisateur = piikti_users_meta.id_utilisateur
WHERE piikti_produit.id = $idProduit
ORDER BY id_createurs DESC";

$reqS = $connection -> prepare($sql);
$reqS -> execute();


while ($ligne = $reqS -> fetch()) {
    $nomProduit = $ligne -> nom_produit;
    $descProduit = $ligne -> desc_produit;
    $prixProduit = $ligne -> prix_produit;
    $tailleS = $ligne -> tailleS;
    $tailleM = $ligne -> tailleM;
    $tailleL = $ligne -> tailleL;
    $pathPhotoProduit = $ligne -> chemin_photo_produit;
    $pathPhotoProfil = $ligne -> chemin_photo_profile;
    $prenom = $ligne -> prenom;
    $nom = $ligne -> nom;
    $idCrea = $ligne -> id_createurs;
    $sexeProduit = $ligne -> sexe_produit;
}
?>

<div class="blocRougeProduit">
    <div class="cadrePhotoProduit">
        <img src="<?php echo $pathPhotoProduit; ?>" alt="photo du produit <?php echo $nomProduit; ?>">
    </div>
    <div class="blocinfoCreateursProduits">
        <div class="photoCreateursProduit">
            <img src="<?php echo $pathPhotoProfil; ?>" alt="photo de profile de <?php echo $prenom." ".$nom; ?>">
        </div>
        <div class="infoCreateurs">
            <p class="nomCreateursProduit">Créations par <a href="page-profil.php?idCrea=<?php echo $idCrea; ?>"><?php echo $prenom." ".$nom; ?></a></p>
            <p class="nom-produit"><?php echo $nomProduit; ?></p>
            <p class="prix-produit"><?php echo $prixProduit; ?> €</p>
        </div>
    </div>
</div>
<div class="info-sup-produit">
    <p class="descProduitProfil"><?php echo $descProduit; ?></p>
    <div class="detailsProduit">
        <form class="formProduit"  method="post">
            <p class="taille-produit">Sélectionner la taille</p>
            <div class="blocRadioProduit">
                    <?php
                    if (!empty($tailleS)) {
                        echo "	<div class='containerRadioProduit alternativeTailleS'>
                                  <input type='radio' name='group1' value='S' id='radio-1' class='radioP'>
                                  <label for='radio-1' class='labelP'><span class='radio'></span></label>
                            	</div>";
                    } else {
                        echo "<div class='containerRadioProduit alternativeTailleS'>
                                <input type='radio' disabled name='group1' id='radio-1' class='radioP'>
                                <label for='radio-1' class='labelP'><span class='radio'></span></label>
                            </div>";
                    }
                    if (!empty($tailleM)) {
                        echo "<div class='containerRadioProduit alternativeTailleM'>
                                <input type='radio' name='group1' value='M' id='radio-2' class='radioP'>
                                <label for='radio-2' class='labelP'><span class='radio'></span></label>
                            </div>";
                    } else {
                        echo "<div class='containerRadioProduit alternativeTailleM'>
                                <input type='radio' disabled name='group1' id='radio-2' class='radioP'>
                                <label for='radio-2' class='labelP'><span class='radio'></span></label>
                            </div>";
                    }
                    if (!empty($tailleL)) {
                        echo "<div class='containerRadioProduit alternativeTailleL'>
                                <input type='radio' name='group1' value='L' id='radio-3' class='radioP'>
                                <label for='radio-3' class='labelP'><span class='radio'></span></label>
                            </div>";
                    } else {
                        echo "<div class='containerRadioProduit alternativeTailleL'>
                                <input type='radio' disabled name='group1' id='radio-3' class='radioP'>
                                <label for='radio-3' class='labelP'><span class='radio'></span></label>
                            </div>";
                    }
                    ?>


            </div>
            <button type="submit" name="buttonPanier" class="bouton-Panier">Ajouter au panier</button>
        </form>
        <select class="guide-Taille">
            <option>Guide des tailles</option>
            <option>S - ....</option>
            <option>M - ....</option>
            <option>L - ...</option>
        </select>
    </div>
</div>

<?php

$sql = "SELECT piikti_produit.id AS id_produit, piikti_users.id AS id_createurs, nom, prenom, nom_produit, prix_produit, chemin_photo_produit FROM piikti_users INNER JOIN piikti_produit WHERE piikti_users.id = piikti_produit.id_utilisateur AND sexe_produit = '$sexeProduit' ORDER BY RAND()";
$reqP = $connection -> prepare($sql);

$reqP -> execute();
?>
<div class="produit-sup">
    <h2 class="titre-profil-produit">Vous aimerez aussi</h2>
    <div class="choix-produit">

        <?php

        while ($ligne = $reqP -> fetch()) {
            echo
                "<div class='blocProduit'>
                    <a href='profile-produit.php?idProduit=".$ligne -> id_produit."' class='blocPhotoProduit'>
                        <div class='blocPhotoProduitV2'>
                            <img src='".$ligne -> chemin_photo_produit."' alt='photo dun produit' class='photoProduitAffichage'>
                        </div>
                    </a>
                    <div class='inFoProduit'>
                        <div class='blocNomProduit'>
                            <p>".$ligne -> nom_produit."</p>
                        </div>
                        <div class='infotarif'>
                            <p class='prixProduit'>".$ligne -> prix_produit." €</p>
                            <a href='page-profil.php?idCrea=".$ligne -> id_createurs."' class='createursProduit'>".$ligne -> prenom." ".$ligne -> nom."</a>
                        </div>
                    </div>
                </div>";
        }

        ?>
    </div>
</div>

<?php include('footer.php') ?>
