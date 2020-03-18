<?php session_start(); ?>
<?php include('../BDD/PDO/connection_bdd.php'); ?>
<?php

$mailVerifMdp = $_SESSION['loginsession'];

if (isset($_POST['buttonMdp']) && !empty($_POST['mdpEdit']) && !empty($_POST['mdpNew'])) {
    $_SESSION['maj'] = "";
    $_SESSION['erreurEdit'] = "";
    $mdpEdit =  $_POST['mdpEdit'];
    $mdpNew = $_POST['mdpNew'];

    $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mailVerifMdp'");
    $reqS -> execute();

    while ($ligne = $reqS -> fetch()) {
        $hash = $ligne -> mdp;
    }

    if (password_verify($mdpEdit, $hash)) {
        $mdpNew = password_hash($mdpNew, PASSWORD_BCRYPT);

        $insert = $connection -> prepare("UPDATE piikti_users SET mdp = '$mdpNew' WHERE mail = '$mailVerifMdp' ");

        $ok = $insert -> execute();

        if ($ok) {
            $_SESSION['maj'] .= "<p class='majedit'>Mot de passe bien mise à jour.</p>";
            header('Location: ../edition-profile.php');
        }
    } else {
        $_SESSION['erreurEdit'] .= "<p class='erreurInfo'>Le mot de passe est incorrect !</p>";
        header('Location: ../edition-profile.php');
    }
}
