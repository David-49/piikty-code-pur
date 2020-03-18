<?php session_start(); ?>
<?php include('BDD/PDO/connection_bdd.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>



<form class="formConnexion" method="post">
        <p class="containerRadio">
    <input type="checkbox" name="tailleS" value="S" class="radioTaille radioS" id="taille-S">
    <label for="taille-S" class="labelRadio label-S">S</label>
</p>
<p class="containerRadio">
    <input type="checkbox" name="tailleM" value="M" class="radioTaille radioM" id="taille-M">
    <label for="taille-M" class="labelRadio label-M">M</label>
</p>
<p class="containerRadio">
    <input type="checkbox" name="tailleL" value="L" class="radioTaille radioL" id="taille-L">
    <label for="taille-L" class="labelRadio label-L">L</label>
</p>

<button type="submit" name="button">valider</button>

</form>
<?php



if (!empty($_POST['tailleS'])) {
    var_dump($_POST['tailleS']);
    $tailleS = $_POST['tailleS'];

    if ($tailleS == "S") {
        echo "ok S";
    }
}


if (!empty($_POST['tailleM'])) {
    var_dump($_POST['tailleM']);
    $tailleM = $_POST['tailleM'];
    if ($tailleM == "M") {
        echo "ok M";
    }
}

if (!empty($_POST['tailleL'])) {
    var_dump($_POST['tailleL']);
    $tailleL = $_POST['tailleL'];
    if ($tailleL == "L") {
        echo "ok L";
    }
}

if (!empty($_POST['tailleS']) || !empty($_POST['tailleM']) || !empty($_POST['tailleL'])) {
    $tailleS = "";
    $tailleM = "";
    $tailleL = "";

    $tailleS = $_POST['tailleS'];
    $tailleM = $_POST['tailleM'];
    $tailleL = $_POST['tailleL'];

    //insertion bdd
}


?>
    </body>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


</html>
