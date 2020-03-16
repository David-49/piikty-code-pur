<?php

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

if (isset($_POST['boutonEdit']) {
    if (!empty($_POST['nomEdit'])) {
        $nom = valid_donnees($_POST['nom']);

        if (strlen($nom) < 256) {

        }
    }
    if (!empty($_POST['prenomEdit'])) {
        $prenomEdit = valid_donnees($_POST['prenomEdit']);

        if (strlen($prenomEdit)) {

        }
    }
    if (!empty($_POST['descEdit'])) {
        $descEdit= valid_donnees($_POST['descEdit']);

        if (strlen($descEdit) < 1001) {
            // code...
        }
    }
    if (!empty($_POST['mailEdit'])) {
        $mailEdit = valid_donnees($_POST['mailEdit']);

        if (filter_var($mailEdit, FILTER_VALIDATE_EMAIL)) {
            $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mailEdit'");
            $reqS -> execute();
            if ($reqS -> rowCount() == 0) {
                $insert = $connection -> prepare("INSERT INTO piikti_users (mail) VALUES(:mail)");

                $ok = $insert -> execute([
                    'mail' => $mail,
                ]);
            }
            else {
                /$erreurEdit = "<p class='erreurEdit'>Cet adresse email est déjà utilisé</p>";
            }
        }
        else {
            $erreurEdit = "<p class='erreurEdit'>Format incorrect d'adresse email.</p>";
        }
    }
    if (!empty($_POST['tel'])) {
        $tel = valid_donnees($_POST['tel']);
    }
    if (!empty($_POST['age']))) {
        $age = valid_donnees($_POST['age']);
    }
}
