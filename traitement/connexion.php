<?php session_start(); ?>
<?php include('../BDD/PDO/connection_bdd.php'); ?>
<?php include('data-cleaning.php'); ?>
<?php
if (isset($_POST['buttonCo']) && !empty($_POST['mailConnect']) && !empty($_POST['mdpConnect'])) {
    $mail =  valid_donnees($_POST['mailConnect']);
    $mdp = $_POST['mdpConnect'];

    $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mail'");
    $reqS -> execute();

    if ($reqS -> rowCount() == 1) {
        while ($ligne = $reqS -> fetch()) {
            $id = $ligne -> id;
            $hash = $ligne -> mdp;
        }

        if (password_verify($mdp, $hash)) {
            $_SESSION['loginsession'] = $_POST['mailConnect'];
            $_SESSION['idsession'] = $id;
            header('Location: '.$_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['erreurCo'] = "<p class='erreurInfo'>Le mot de passe est incorrect !</p>";
        }
    } else {
        $_SESSION['erreurCo'] = "<p class='erreurInfo'>Cet email n'existe pas dans notre base de données.</p>";
    }
}
