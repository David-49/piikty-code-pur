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

    $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mail'");
    $reqS -> execute();

    if ($reqS -> rowCount() == 1) {
        while ($ligne = $reqS -> fetch()) {
            $hash = $ligne -> mdp;
        }

        if (password_verify($mdp, $hash)) {
            $_SESSION['loginsession'] = $_POST['mailConnect'];
            header('Location: index.php');
        } else {
            echo "<p>Le mot de passe est incorrect !</p>";
        }
    } else {
        echo "<p class='erreurInfo'>Cet email n'existe pas dans notre base de données.</p>";
    }
}
