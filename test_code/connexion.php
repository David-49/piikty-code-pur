<?php
$erreurCo = "";
if (isset($_POST['buttonCo']) && !empty($_POST['mailConnect']) && !empty($_POST['mdpConnect'])) {
    function valid_donnees($donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    $mail =  valid_donnees($_POST['mailConnect']);
    $mdp = $_POST['mdpConnect'];
    // $mdp = password_hash($mdp, PASSWORD_BCRYPT);

    $reqS = $connection -> prepare("SELECT mail, mdp FROM piikti_users WHERE mail = '$mail' AND mdp='$mdp' ");
    $reqS -> execute();


    if ($reqS -> rowCount() == 1) {
        $_SESSION['loginsession'] = $_POST['mail'];
        $erreur = "<p>OK</p>";
    // header('Location: index.php');
    } else {
        $erreurCo = "<p class='erreurInfo'>Vos identifiants sont incorrects !</p>";
    }
}
