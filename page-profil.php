<?php session_start(); ?>
<?php include('header.php'); ?>

<?php

if (isset($_SESSION['idsession'])) {
    $id = $_SESSION['idsession'];
} else {
    if (!empty($_GET['idCrea'])) {
        $id = htmlspecialchars($_GET['idCrea']);
    }
}

$sql = "SELECT *
FROM piikti_users
INNER JOIN piikti_users_meta
WHERE piikti_users.id = piikti_users_meta.id_utilisateur
AND piikti_users.id = '$id'";

$userReq = $connection -> prepare($sql);

$userReq -> execute();

while ($ligne = $userReq -> fetch()) {
    $prenom = $ligne -> prenom;
    $nom = $ligne -> nom;
    $dateNaissance = $ligne -> dateNaissance;
    $mail = $ligne -> mail;
    $desc = $ligne -> description;
    $pathPhoto = $ligne -> chemin_photo_profile;
    $fbLien = $ligne -> facebook_lien;
    $instaLien = $ligne -> instagram_lien;
    $pintLien = $ligne -> pinterest_lien;
}

$userReq -> closeCursor();

if ($desc == null) {
    $desc  = "";
}
if ($pathPhoto == null) {
    $pathPhoto  = "";
}
if ($fbLien == null) {
    $fbLien = "";
}
if ($instaLien == null) {
    $instaLien = "";
}
if ($pintLien == null) {
    $pintLien = "";
}



function age($date)
{
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}

$age = age($dateNaissance);

$nbProd = $connection -> prepare("SELECT COUNT(*) AS nbLigne FROM piikti_produit WHERE id_utilisateur = '$id'");
$nbProd -> execute();

while ($ligne = $nbProd -> fetch()) {
    $nbLigne = $ligne -> nbLigne;
}


$sqlProduit = $connection -> prepare("SELECT piikti_produit.id AS id_produit, nom_produit, nom, prenom, prix_produit, chemin_photo_produit FROM piikti_produit INNER JOIN piikti_users WHERE piikti_users.id = piikti_produit.id_utilisateur AND id_utilisateur = '$id' ORDER BY piikti_produit.id DESC");

$sqlProduit -> execute();



?>


<div class='cadreProfil'>
    <div class='cadrePhotoProfil'>

    <img src="<?php
        if ($pathPhoto != "" || $pathPhoto != null) {
            echo $pathPhoto;
        } else {
            echo "img/profil_defaut.jpg";
        }
     ?>" alt="image profil temporaire de l'utilisateur" class="photoCreateursProfil">

    </div>
    <div class="blocRouge">
        <div class='blocinfoCreateursProfil'>

            <p class='nomCreateursProfil'><?php echo $prenom." ".strtoupper($nom); ?></p>

            <p class='ageCreateursProfil'><?php echo $age; ?> ans</p>
            <p class="nbProduitCreateur"><?php echo $nbLigne; ?> création(s) mises en ligne</p>
            <a href="mailto: <?php echo $mail; ?>"class="emailCreateur"><?php echo $mail; ?></a>

            <div class="logoRSProfil">
            <?php
            if ($fbLien != "") {
                ?>
                <a href="<?php echo $fbLien; ?>">
                    <img src="logo/facebook.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                </a>
            <?php
            }
            if ($instaLien != "") {
                ?>
                <a href="<?php echo $instaLien; ?>">
                    <img src="logo/instagram.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                </a>
            <?php
            }

            if ($pintLien != "") {
                ?>
                <a href="<?php echo $pintLien; ?>">
                    <img src="logo/pinterest.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                </a>
            <?php
            }
            ?>
            </div>
        </div>
        <div class="blocBoutonUser">
            <?php
            if (isset($_SESSION['idsession'])) {
                ?>
                <a href="ajout_produits.php" class="lienAjoutProduit"><i class="fas fa-plus-circle"></i><p>Ajouter un nouveau produit</p></a>

                <a href="edition-profile.php" class="lienSetting"><i class="fas fa-cog"></i><p>Paramètres</p></a>
                <?php
            }
            ?>

        </div>
    </div>

    <div class="blocDescription">
        <p class="descProfil"><?php echo $desc; ?></p>
    </div>

</div>


<div class="mesProduits">
    <h2 class="titreProduit">Mes Produits</h2>
    <div class="wrapProduitProfil">
        <?php
        while ($ligne = $sqlProduit -> fetch()) {
            echo
            "<div class='blocProduitProfile'>
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
                        <p class='createursProduit'>".$ligne -> prenom." ".$ligne -> nom."</p>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>

<div class="espaceCommentaire">
    <h2 class="titreEspaceCom">Laisser un commentaire à <?php echo  $prenom." ".strtoupper($nom); ?> ?</h2>
    <?php include('template/comments.php') ?>
</div>




<?php include('footer.php'); ?>
