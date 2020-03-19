<?php session_start(); ?>
<?php include('header.php') ?>
<?php include('traitement/data-cleaning.php'); ?>

<?php

if (!empty($_GET['cat'])) {
    $sexeProduit = htmlspecialchars($_GET['cat']);

    if ($sexeProduit == 'homme') {
        $sexeProduit = 'homme';
    } elseif ($sexeProduit == 'femme') {
        $sexeProduit = 'femme';
    }
}


$sql = "SELECT piikti_produit.id AS id_produit, piikti_users.id AS id_createurs, id_utilisateur, nom, prenom, nom_produit, prix_produit, chemin_photo_produit FROM piikti_users INNER JOIN piikti_produit WHERE piikti_users.id = piikti_produit.id_utilisateur AND sexe_produit = '$sexeProduit'";
$check = "";

$btnALL = true;
$btnManteaux = false;
$btnChemises = false;
$btnPulls = false;
$btnTshirts = false;
$btnPantalons = false;
$btnAcc = false;

if (!empty($_POST['btnALL'])) {
    $check = true;
}

if (!empty($_POST['btnManteaux'])) {
    $btnManteaux = valid_donnees($_POST['btnManteaux']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnManteaux'";
    $check = false;
    $btnManteaux = true;
    $btnALL = false;
}

if (!empty($_POST['btnChemises'])) {
    $btnChemises = valid_donnees($_POST['btnChemises']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnChemises'";
    $check = false;
    $btnChemises = true;
    $btnALL = false;
}

if (!empty($_POST['btnPulls'])) {
    $btnPulls = valid_donnees($_POST['btnPulls']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnPulls'";
    $check = false;
    $btnPulls = true;
    $btnALL = false;
}

if (!empty($_POST['btnTshirts'])) {
    $btnTshirts = valid_donnees($_POST['btnTshirts']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnTshirts'";
    $check = false;
    $btnTshirts = true;
    $btnALL = false;
}

if (!empty($_POST['btnPantalons'])) {
    $btnPantalons = valid_donnees($_POST['btnPantalons']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnPantalons'";
    $check = false;
    $btnPantalons = true;
    $btnALL = false;
}

if (!empty($_POST['btnAcc'])) {
    $btnAcc = valid_donnees($_POST['btnAcc']);
    $sql .= " AND  piikti_produit.cat_produit = '$btnAcc'";
    $check = false;
    $btnAcc = true;
    $btnALL = false;
}
if ($check == true) {
    $sql  = "SELECT piikti_produit.id AS id_produit, piikti_users.id AS id_createurs, id_utilisateur, nom, prenom, nom_produit, prix_produit, chemin_photo_produit FROM piikti_users INNER JOIN piikti_produit WHERE piikti_users.id = piikti_produit.id_utilisateur AND sexe_produit = '$sexeProduit'";
}

$sql .= " ORDER BY piikti_produit.id DESC";

$reqS = $connection -> prepare($sql);
$reqS -> execute();

?>

<?php if ($sexeProduit == 'homme') {
    ?>
    <div class="banniereCreateurs">
        <img src="img/categorie_homme.jpg" class="image-banniere-produit">
        <div class="calque"></div>

        <h1  class="titrePageCreateurs"><?php echo strtoupper($sexeProduit); ?></h1>
    </div>
<?php
} else {
        ?>
    <div class="banniereCreateurs">
        <img src="img/categorie_femme.jpg" class="image-banniere-produit">
        <div class="calque"></div>

        <h1  class="titrePageCreateurs"><?php echo strtoupper($sexeProduit); ?></h1>
    </div>
    <?php
    }
?>

<div class="containerProduit">

    <div class="sideBarProduit">
        <h1 class="titrePageProduit">CATALOGUE PRODUITS</h1>

        <form class="filtreProduit"  method="post">
            <button type="submit" name="btnAll" value="all" class="<?php if ($btnALL == true) {
    echo "cat-rouge";
} ?>">VOIR TOUT</button>
            <button type="submit" name="btnManteaux" value="manteaux_blousons" class="<?php if ($btnManteaux == true) {
    echo "cat-rouge";
} ?>">MANTEAUX/BLOUSONS</button>
            <button type="submit" name="btnChemises" value="chemises" class="<?php if ($btnChemises == true) {
    echo "cat-rouge";
} ?>">CHEMISES</button>
            <button type="submit" name="btnPulls" value="pull" class="<?php if ($btnPulls == true) {
    echo "cat-rouge";
} ?>">PULLS</button>
            <button type="submit" name="btnTshirts" value="t_shirts" class="<?php if ($btnTshirts == true) {
    echo "cat-rouge";
} ?>">T-SHIRTS</button>
            <button type="submit" name="btnPantalons" value="pantalon" class="<?php if ($btnPantalons == true) {
    echo "cat-rouge";
} ?>">PANTALONS</button>
            <button type="submit" name="btnAcc" value="accessoires" class="<?php if ($btnAcc == true) {
    echo "cat-rouge";
} ?>">ACCESSOIRES</button>
        </form>
    </div>

    <div class="wrapProduit">

        <?php

        while ($ligne = $reqS -> fetch()) {
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
