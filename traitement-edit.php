<?php session_start(); ?>
<?php
function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$maj = "";
$erreurEdit = "";
$login = $_SESSION['loginsession'];

$reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail= '$login'");
$reqS -> execute();

while ($ligne = $reqS -> fetch()) {
    $id = $ligne -> id;
}


if (isset($_POST['boutonEdit']) {


    $reqS = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");
    $reqS -> execute();
    if ($reqS -> rowCount() == 0) {

        $reqI = $connection -> prepare("INSERT INTO piikti_users_meta (id_utilisateur) VALUES (:id_utilisateur)");

        $reqI -> execute([
            'id_utilisateur' => $id,
        ]);

        $reqI -> closeCursor();

    }



    if (!empty($_POST['photo'])) {
        $nomFichier = $_FILES["photo"]["name"];
        $type = $_FILES['photo']['type'];
        $taille = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];
        $temp_name =  $_FILES["photo"]["tmp_name"];

        //on récupère l'info de l'extension (.jpg si photo)
        $info = strtolower(strrchr($nomFichier, "."));

        //on stock dans une variable la destination du fichier jusqu'au dossier serveur
        $destination = "upload/photo_profile/$nomFichier";

        if ($info == ".jpg" || $info == ".jpeg" && $taille <= 2000000) {

            //on déplace le fichier dans notre serveur
            move_uploaded_file($temp_name, $destination);

            $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET nom = '$nomFichier' WHERE id= $id");
            $reqUp -> execute();
            $ok = $reqUp -> closeCursor();

            if ($ok) {
                $maj .= "<p class='majedit'>Photo de profile bien mise à jour.</p>";
            }

            $req -> closeCursor();

            //on renomme le fichier de sorte que chaque fichier ai un nom unique avec l'id
            rename("upload/photo_profile/$nomFichier";, "upload/photo_profile/Photo_".$id.$info);

            //on met à jour la variable avec le nouveau nom
            $nomFichier = "Photo_".$id.$info;

            //on met à jour le nom du fichier dans la base de donnée
            $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET nom = '$nomFichier' WHERE id= $id");
            $reqUp -> execute();
            $reqUp -> closeCursor();


        }
    }






    if (!empty($_POST['nomEdit'])) {
        $nom = valid_donnees($_POST['nom']);

        if (strlen($nom) < 256) {
            $reqUp = $connection -> prepare("UPDATE piikti_users SET nom = '$nomEdit' WHERE id= $id");
            $ok = $reqUp -> execute();

            if ($ok) {
                $maj .= "<p class='majedit'>Nom bien mise à jour.</p>";
            }
            $reqUp -> closeCursor();
        }
    }





    if (!empty($_POST['prenomEdit'])) {
        $prenomEdit = valid_donnees($_POST['prenomEdit']);

        if (strlen($prenomEdit)) {
            $reqUp = $connection -> prepare("UPDATE piikti_users SET nom = '$prenomEdit' WHERE id= $id");
            $ok = $reqUp -> execute();

            if ($ok) {
                $maj .= "<p class='majedit'>Prenom bien mise à jour.</p>";
            }
            $reqUp -> closeCursor();
        }
    }




    if (!empty($_POST['descEdit'])) {
        $descEdit= valid_donnees($_POST['descEdit']);

        if (strlen($descEdit) < 1001) {
            $reqS = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");
            $reqS -> execute();
            if ($reqS -> rowCount() == 0) {

                $reqI = $connection -> prepare("INSERT INTO piikti_users_meta (id_utilisateur, description) VALUES (:id_utilisateur, :description)");

                $ok = $reqI -> execute([
                    'id_utilisateur' => $id,
                    'description' => $descEdit,
                ]);

                if ($ok) {
                    $maj .= "<p class='majedit'>Description bien mise à jour.</p>";
                }
                $reqI -> closeCursor();

            }
            else {
                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET description = '$descEdit' WHERE id_utilisateur = $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $maj .= "<p class='majedit'>Description bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }
        }
    }



    if (!empty($_POST['mailEdit'])) {
        $mailEdit = valid_donnees($_POST['mailEdit']);

        if (filter_var($mailEdit, FILTER_VALIDATE_EMAIL)) {
            $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mailEdit'");
            $reqS -> execute();
            if ($reqS -> rowCount() == 0) {
                $reqUp = $connection -> prepare("UPDATE piikti_users SET mail = '$mailEdit' WHERE id= $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $maj .= "<p class='majedit'>Email bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }
            else {
                $erreurEdit .= "<p class='erreurEdit'>Cet adresse email est déjà utilisé</p>";
            }
        }
        else {
            $erreurEdit .= "<p class='erreurEdit'>Format incorrect d'adresse email.</p>";
        }
    }




    if (!empty($_POST['tel'])) {
        $tel = valid_donnees($_POST['tel']);

        if (preg_match("^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$", $tel)) {

            $reqS = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");
            $reqS -> execute();
            if ($reqS -> rowCount() == 0) {

                $reqI = $connection -> prepare("INSERT INTO piikti_users_meta (id_utilisateur, tel) VALUES (:id_utilisateur, IS:tel)");

                $ok = $reqI -> execute([
                    'id_utilisateur' => $id,
                    'numero' => $tel,
                ]);

                if ($ok) {
                    $maj .= "<p class='majedit'>Numéro de téléphone bien mise à jour.</p>";
                }

                $reqI -> closeCursor();

            }
            else {
                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET numero = '$tel' WHERE id_utilisateur = $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $maj .= "<p class='majedit'>Numéro de téléphone bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }

        }
        else {
            $erreurEdit .= "<p class='erreurEdit'>Veuillez rentrer un numéro de téléphone au format français.</p>";
        }
    }
}
