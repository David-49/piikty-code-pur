<?php session_start(); ?>
<?php include('header.php') ?>
<?php include('traitement/data-cleaning.php'); ?>

<?php
$id = $_SESSION['idsession'];


if (!empty($_GET['cat'])) {
    $sexeProduit = htmlspecialchars($_GET['cat']);
}


$sql = "SELECT piikti_produit.id AS id_produit, piikti_users.id AS id_createurs, id_utilisateur, nom, prenom, nom_produit, prix_produit, chemin_photo_produit FROM piikti_users INNER JOIN piikti_produit WHERE piikti_users.id = piikti_produit.id_utilisateur AND sexe_produit = '$sexeProduit'";
$check = "";

if (!empty($_POST['btnALL'])) {
    var_dump($_POST['btnALL']);
    $check = true;
}

if (!empty($_POST['btnManteaux'])) {
    var_dump($_POST['btnManteaux']);
    $btnManteaux = valid_donnees($_POST['btnManteaux']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnManteaux'";
    $check = false;
}

if (!empty($_POST['btnChemises'])) {
    var_dump($_POST['btnChemises']);
    $btnChemises = valid_donnees($_POST['btnChemises']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnChemises'";
    $check = false;
}

if (!empty($_POST['btnPulls'])) {
    var_dump($_POST['btnPulls']);
    $btnPulls = valid_donnees($_POST['btnPulls']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnPulls'";
    $check = false;
}

if (!empty($_POST['btnTshirts'])) {
    var_dump($_POST['btnTshirts']);
    $btnTshirts = valid_donnees($_POST['btnTshirts']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnTshirts'";
    $check = false;
}

if (!empty($_POST['btnPantalons'])) {
    var_dump($_POST['btnPantalons']);
    $btnPantalons = valid_donnees($_POST['btnPantalons']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnPantalons'";
    $check = false;
}

if (!empty($_POST['btnAcc'])) {
    var_dump($_POST['btnAcc']);
    $btnAcc = valid_donnees($_POST['btnAcc']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnAcc'";
    $check = false;
}
if ($check == true) {
    $sql  = "SELECT piikti_produit.id AS id_produit, piikti_users.id AS id_createurs, id_utilisateur, nom, prenom, nom_produit, prix_produit, chemin_photo_produit FROM piikti_users INNER JOIN piikti_produit WHERE piikti_users.id = piikti_produit.id_utilisateur AND sexe_produit = '$sexeProduit'";
}

$sql .= " ORDER BY piikti_produit.id DESC";

$reqS = $connection -> prepare($sql);
$reqS -> execute();

?>

<div class="containerProduit">

    <div class="sideBarProduit">
        <h1 class="titrePageProduit">CATALOGUE PRODUITS</h1>

        <form class="filtreProduit"  method="post">
            <button type="submit" name="btnAll" value="all">VOIR TOUT</button>
            <button type="submit" name="btnManteaux" value="manteaux_blousons">MANTEAUX/BLOUSONS</button>
            <button type="submit" name="btnChemises" value="chemises">CHEMISES</button>
            <button type="submit" name="btnPulls" value="pull">PULLS</button>
            <button type="submit" name="btnTshirts" value="t_shirts">T-SHIRTS</button>
            <button type="submit" name="btnPantalons" value="pantalon">PANTALONS</button>
            <button type="submit" name="btnAcc" value="accessoires">ACCESSOIRES</button>
        </form>
    </div>

    <div class="wrapProduit">

        <?php

        while ($ligne = $reqS -> fetch()) {
            echo
                "<div class='blocProduit'>
                    <a href='profile-produit.php?idProduit=".$ligne -> id_produit."' class='blocPhotoProduit'>
                        <img src='".$ligne -> chemin_photo_produit."' alt='photo dun produit' class='photoProduitAffichage'>
                    </a>
                    <div class='inFoProduit'>
                        <div class='blocNomProduit'>
                            <p>".$ligne -> nom_produit."</p>
                        </div>
                        <div class='infotarif'>
                            <p class='prixProduit'>".$ligne -> prix_produit." €</p>
                            <a href='page-profile.php?idCrea=".$ligne -> id_createurs."' class='createursProduit'>".$ligne -> prenom." ".$ligne -> nom."</a>
                        </div>
                    </div>
                </div>
            ";
        }

        ?>

    </div>

</div>
<?php include('footer.php') ?>
