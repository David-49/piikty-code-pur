<?php include('header.php') ?>

<?php

$mailUser = $_SESSION['loginsession'];
$userReq = $connection -> prepare("SELECT * FROM piikti_users INNER JOIN piikti_users_meta ON piikti_users.id = piikti_users_meta.id_tilisateur WHERE piikti_users.mail = '$mailUser'");

$userReq -> execute();

while ($ligne = $userReq -> fetch()) {
    $prenom = $ligne -> prenom;
    $nom = $ligne -> nom;
    $age = $ligne -> age;
    $mail = $ligne -> mail;
    $desc = $ligne -> description;
}
    ?>


<div class='cadreProfil'>
    <div class='cadrePhotoProfil'>

    <img src="logo/user-solid.svg" alt="image profil temporaire de l'utilisateur" class="photoCreateursProfil">

    </div>
    <div class="blocRouge">
        <div class='blocinfoCreateursProfil'>

            <p class='nomCreateursProfil'><?php echo $prenom." ".strtoupper($nom); ?></p>

            <p class='ageCreateursProfil'><?php echo $age; ?> ans</p>
            <p class="nbProduitCreateur">4 création(s) mises en ligne</p>
            <p class="emailCreateur"><?php echo $mail; ?></p>
            <div class="logoRSProfil">
                <img src="logo/facebook.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                <img src="logo/instagram.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                <img src="logo/pinterest.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
            </div>
        </div>
    </div>

    <div class="blocDescription">
        <p class="descProfil"><?php echo $user_info->description; ?></p>
    </div>

</div>


<div class="mesProduits">
    <h2 class="titreProduit">Mes Produits</h2>
</div>

<div class="espaceCommentaire">
    <h2 class="titreEspaceCom">Laisser un commentaire à <?php echo  $user_info->first_name." ".strtoupper($user_info->last_name); ?> ?</h2>
    <?php get_template_part('comments') ?>
</div>




<?php include('footer.php') ?>
