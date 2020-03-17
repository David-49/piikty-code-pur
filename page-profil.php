<?php include('header.php') ?>

<?php

$mailUser = $_SESSION['loginsession'];

$userReq = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mailUser'");

$userReq -> execute();

while ($ligne = $userReq -> fetch()) {
    $id = $ligne -> id;
    $prenom = $ligne -> prenom;
    $nom = $ligne -> nom;
    $dateNaissance = $ligne -> dateNaissance;
    $mail = $ligne -> mail;
}

$userReq -> closeCursor();

function age($date)
{
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}

$age = age($dateNaissance);

$metaReq = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");

$metaReq -> execute();

if ($metaReq -> rowCount() == 1) {
    while ($ligne = $metaReq -> fetch()) {
        $desc = $ligne -> description;
        $pathPhoto = $ligne -> chemin_photo_profile;
    }
} else {
    $desc  = "";
    $pathPhoto = "";
}

$metaReq -> closeCursor();


?>


<div class='cadreProfil'>
    <div class='cadrePhotoProfil'>

    <img src="<?php
        if ($pathPhoto != "" || $pathPhoto != null) {
            echo $pathPhoto;
        } else {
            echo "logo/user-solid.svg";
        }
     ?>" alt="image profil temporaire de l'utilisateur" class="photoCreateursProfil">

    </div>
    <div class="blocRouge">
        <div class='blocinfoCreateursProfil'>

            <p class='nomCreateursProfil'><?php echo $prenom." ".strtoupper($nom); ?></p>

            <p class='ageCreateursProfil'><?php echo $age; ?> ans</p>
            <p class="nbProduitCreateur">4 création(s) mises en ligne</p>
            <a href="mailto: <?php echo $mail; ?>"class="emailCreateur"><?php echo $mail; ?></p>
            <!-- <div class="logoRSProfil">
                <img src="logo/facebook.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                <img src="logo/instagram.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                <img src="logo/pinterest.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
            </div> -->
        </div>
        <div class="blocBoutonUser">
            <?php
            if (isset($_SESSION['loginsession'])) {
                ?>
                <a href="ajout-produits.php" class="lienAjoutProduit"><i class="fas fa-plus-circle"></i><p>Ajouter un nouveau produit</p></a>

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
</div>

<div class="espaceCommentaire">
    <h2 class="titreEspaceCom">Laisser un commentaire à <?php echo  $prenom." ".strtoupper($nom); ?> ?</h2>
    <?php include('comments.php') ?>
</div>




<?php include('footer.php') ?>
