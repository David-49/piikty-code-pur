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

<?php include('footer.php') ?>
