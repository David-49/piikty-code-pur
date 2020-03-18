<?php session_start(); ?>
<?php include('header.php') ?>

<?php
$id = $_SESSION['idsession'];


$reqS = $connection -> prepare("SELECT * FROM piikti_produit WHERE id_utilisateur = '$id'");
$reqS -> execute();

if ($reqS -> rowCount() == 1) {
    while ($ligne = $reqS -> fetch()) {
        $nomProduit = $ligne -> nom_produit;
        $descProduit = $ligne -> desc_produit;
        $prixProduit = $ligne -> prix_produit;
        $catProduit= $ligne -> cat_produit;
        $tailleS = $ligne -> tailleS;
        $tailleM = $ligne -> tailleM;
        $tailleL = $ligne -> tailleL;
        $pathPhoto = $ligne -> chemin_photo_produit;
    }
} else {
    $nomProduit = "";
    $descProduit  = "";
    $prixProduit = "";
    $catProduit = "";
    $pathPhoto = "";
    $tailleS = "";
    $tailleM = "";
    $tailleL = "";
}
?>
<div class="containerProduit">

    <div class="sideBar">
        <h1 class="titrePageProduit">CATALOGUE PRODUITS</h1>

        <form class="filtreProduit"  method="post">
            <button type="submit" name="btnAll">VOIR TOUT</button>
            <button type="submit" name="btnManteaux">MANTEAUX/BLOUSONS</button>
            <button type="submit" name="btnChemises">CHEMISES</button>
            <button type="submit" name="btnPulls">PULLS</button>
            <button type="submit" name="btnTshirts">T-SHIRTS</button>
            <button type="submit" name="btnPantalons">PANTALONS</button>
            <button type="submit" name="btnAcc">ACCESSOIRES</button>
        </form>
    </div>
    
    <div class="wrapProduit"></div>

</div>
<?php include('footer.php') ?>
