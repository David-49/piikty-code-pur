<?php
  $erreurIns = "";
if (isset($_POST['buttonCo']) and !empty($_POST['prenom']) and !empty($_POST['nom']) and !empty($_POST['mailInscription']) and !empty($_POST['mdpInscription'])) {
    function valid_donnees($donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
    $prenom = valid_donnees($_POST['prenom']);
    $nom = valid_donnees($_POST['nom']);
    $mail = valid_donnees($_POST['mailInscription']);
    $mdp = $_POST['mdpInscription'];
    $mdpVerif = $_POST['mdpVerif'];
    $date = date('Y/m/d');


    $prenomTaille = strlen($prenom);
    $nomTaille = strlen($nom);
    $mailTaille = strlen($mail);

    if ($prenomTaille < 256) {
        if ($nomTaille < 256) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mail'");
                $reqS -> execute();
                if ($reqS -> rowCount() == 0) {
                    if ($mdp == $mdpVerif) {
                        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                        $insert = $connection -> prepare("INSERT INTO piikti_users (prenom, nom, mail, mdp, date_inscription) VALUES(:prenom, :nom, :mail, :mdp, :date_inscription)");

                        $ok = $insert -> execute([
                            'prenom' => $prenom,
                            'nom' => $nom,
                            'mail' => $mail,
                            'mdp' => $mdp,
                            'date_inscription' => $date,
                        ]);

                        if ($ok) {
                            $_SESSION['loginsession'] = $_POST['mailInscription'];
                            header('Location: edition-profile.php');
                        }
                    } else {
                        $erreurIns = "<p class='erreurInfo'>Les mots de passe ne correspondent pas !</p>";
                    }
                } else {
                    $erreurIns = "<p class='erreurInfo'>Cet adresse email est déjà utilisé. Veuillez en choisir une autres.</p>";
                }
            } else {
                $erreurIns = "<p class='erreurInfo'>Veuillez rentrer une adresse email.</p>";
            }
        } else {
            $erreurIns = "<p class='erreurInfo'>Votre nom dépasse la limite des 255 caractères. Veuillez choisir un autres nom.</p>";
        }
    } else {
        $erreurIns = "<p class='erreurInfo'>Votre prenom dépasse la limite des 255 caractères. Veuillez choisir un autres prenom.</p>";
    }
}
