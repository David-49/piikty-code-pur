<?php session_start(); ?>
<?php include('header.php'); ?>

<div class="banniereCreateurs">
    <img src="img/banniere_createurs.jpg" class="image-banniere-createurs">
    <div class="calque"></div>

    <h1  class="titrePageCreateurs">LES CREATEURS</h1>
</div>



<?php include('template/searchForm.php'); ?>

<?php
function age($date)
{
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}



$sql = "SELECT DISTINCT
piikti_users.id AS id_createurs, nom, prenom, chemin_photo_profile, dateNaissance
FROM piikti_users
INNER JOIN piikti_users_meta
    ON piikti_users_meta.id_utilisateur = piikti_users.id
INNER JOIN piikti_produit
    ON piikti_produit.id_utilisateur = piikti_users_meta.id_utilisateur
ORDER BY id_createurs DESC";

$reqCreateurs = $connection -> prepare($sql);

$reqCreateurs -> execute();



?>
<div class='blocCreateurs'>

        <?php
        while ($ligne = $reqCreateurs -> fetch()) {
            $lien = (empty($ligne -> chemin_photo_profile)) ? 'img/profil_defaut.jpg' : $ligne -> chemin_photo_profile;
            echo "    <a href='page-profil.php?idCrea=".$ligne -> id_createurs."' class='cadrePhotoCreateur'>
            <img src='".$lien."' alt='photo de profil des créateurs' class='photoCreateurs'>

            <div class='calqueCadreCreateurs'></div>
            <div class='blocinfoCreateurs'>
            <p class='nomCreateurs'>".$ligne -> prenom." ".strtoupper($ligne -> nom)."</p>
            <p class='ageCreateurs'>".$age = age($ligne -> dateNaissance)." ans</p>
            </div>
            </a>";
        }
        ?>




</div>
<?php include('footer.php') ?>
