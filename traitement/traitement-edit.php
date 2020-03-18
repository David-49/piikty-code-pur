<?php session_start(); ?>
<?php include('../BDD/PDO/connection_bdd.php'); ?>
<?php include('data-cleaning.php'); ?>
<?php
if (isset($_SESSION['idsession'])) {
    $id= $_SESSION['idsession'];

    $_SESSION['maj'] = "";
    $_SESSION['erreurEdit'] = "";


    if (isset($_POST['boutonEdit'])) {
        $reqS = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");
        $reqS -> execute();
        if ($reqS -> rowCount() == 0) {
            $reqI = $connection -> prepare("INSERT INTO piikti_users_meta (id_utilisateur) VALUES (:id_utilisateur)");

            $ok = $reqI -> execute([
                'id_utilisateur' => $id,
            ]);

            $reqI -> closeCursor();
        }


        if (!empty($_FILES['photo']['name'])) {
            $nomPhoto = $_FILES["photo"]["name"];
            $type = $_FILES['photo']['type'];
            $taille = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $temp_name =  $_FILES["photo"]["tmp_name"];

            //on récupère l'info de l'extension (.jpg si photo)
            $info = strtolower(strrchr($nomPhoto, "."));

            //on stock dans une variable la destination du fichier jusqu'au dossier serveur
            $destination = "../upload/photo_profile/$nomPhoto";


            if ($info == ".jpg" || $info == ".jpeg" && $taille <= 2000000) {

                //on déplace le fichier dans notre serveur
                move_uploaded_file($temp_name, $destination);

                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET chemin_photo_profile = '$destination' WHERE id= $id");
                $reqUp -> execute();
                $reqUp -> closeCursor();

                $reqUp -> closeCursor();

                //on renomme le fichier de sorte que chaque fichier ai un nom unique avec l'id
                rename("../upload/photo_profile/$nomPhoto", "../upload/photo_profile/Photo_".$id.$info);

                //on met à jour la variable avec le nouveau nom
                $destination = "upload/photo_profile/Photo_".$id.$info;

                //on met à jour le nom du fichier dans la base de donnée
                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET chemin_photo_profile = '$destination' WHERE id_utilisateur = $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Photo de profile bien mise à jour.</p>";
                }

                $reqUp -> closeCursor();
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>La photo n'est pas au format jgp ou fait plus de 2Mo.</p>";
            }
        }






        if (!empty($_POST['nomEdit'])) {
            $nomEdit = valid_donnees($_POST['nomEdit']);

            if (strlen($nomEdit) < 256) {
                $reqUp = $connection -> prepare("UPDATE piikti_users SET nom = '$nomEdit' WHERE id= $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Nom bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }
        }





        if (!empty($_POST['prenomEdit'])) {
            $prenomEdit = valid_donnees($_POST['prenomEdit']);

            if (strlen($prenomEdit) < 256) {
                $reqUp = $connection -> prepare("UPDATE piikti_users SET prenom = '$prenomEdit' WHERE id= $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Prenom bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }
        }




        if (!empty($_POST['descEdit'])) {
            $descEdit= valid_donnees($_POST['descEdit']);

            if (strlen($descEdit) < 1001) {
                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET description = '$descEdit' WHERE id_utilisateur = $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Description bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            }
        }



        if (!empty($_POST['mailEdit'])) {
            $mailEdit = valid_donnees($_POST['mailEdit']);

            if (filter_var($mailEdit, FILTER_VALIDATE_EMAIL)) {
                $reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail = '$mailEdit'");
                $reqS -> execute();

                $reqS2 = $connection -> prepare("SELECT * FROM piikti_users WHERE id = $id");
                $verif = $reqS2 -> execute();

                $mailVerif = "";

                if ($verif) {
                    while ($ligne = $reqS2 -> fetch()) {
                        $mailVerif = $ligne -> mail;
                    }
                }

                // var_dump($mailEdit, $mailVerif);


                if ($mailVerif != $mailEdit) {
                    if ($reqS -> rowCount() == 0) {
                        $reqUp = $connection -> prepare("UPDATE piikti_users SET mail = '$mailEdit' WHERE id= $id");
                        $ok = $reqUp -> execute();

                        if ($ok) {
                            $_SESSION['loginsession'] = $mailEdit;
                            $_SESSION['maj'] .= "<p class='majedit'>Email bien mise à jour.</p>";
                        }
                        $reqUp -> closeCursor();
                    } else {
                        $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Cet adresse email est déjà utilisé.</p>";
                    }
                }
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Format incorrect d'adresse email.</p>";
            }
        }




        if (!empty($_POST['tel'])) {
            $tel = valid_donnees($_POST['tel']);

            if (preg_match("^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$^", $tel)) {
                $reqUp = $connection -> prepare("UPDATE piikti_users_meta SET numero = '$tel' WHERE id_utilisateur = $id");
                $ok = $reqUp -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Numéro de téléphone bien mise à jour.</p>";
                }
                $reqUp -> closeCursor();
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Veuillez rentrer un numéro de téléphone au format français.</p>";
            }
        }

        if (!empty($_POST['facebookEdit'])) {
            $fb = valid_donnees($_POST['facebookEdit']);

            if (filter_var($fb, FILTER_VALIDATE_URL)) {
                $ins = $connection -> prepare("UPDATE piikti_users_meta SET facebook_lien = '$fb' WHERE id_utilisateur = $id");

                $ok = $ins -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Lien Facebook bien mise à jour.</p>";
                }
                $ins -> closeCursor();
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Ce n'est pas une URL.</p>";
            }
        }

        if (!empty($_POST['instaEdit'])) {
            $insta = valid_donnees($_POST['instaEdit']);

            if (filter_var($insta, FILTER_VALIDATE_URL)) {
                $ins = $connection -> prepare("UPDATE piikti_users_meta SET instagram_lien = '$insta' WHERE id_utilisateur = $id");

                $ok = $ins -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Lien Instagram bien mise à jour.</p>";
                }
                $ins -> closeCursor();
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Ce n'est pas une URL.</p>";
            }
        }

        if (!empty($_POST['pintEdit'])) {
            $pint = valid_donnees($_POST['pintEdit']);

            if (filter_var($pint, FILTER_VALIDATE_URL)) {
                $ins = $connection -> prepare("UPDATE piikti_users_meta SET pinterest_lien = '$pint' WHERE id_utilisateur = $id");

                $ok = $ins -> execute();

                if ($ok) {
                    $_SESSION['maj'] .= "<p class='majedit'>Lien Pinterest bien mise à jour.</p>";
                }
                $ins -> closeCursor();
            } else {
                $_SESSION['erreurEdit'] .= "<p class='erreurEdit'>Ce n'est pas une URL.</p>";
            }
        }
        if ($ok) {
            header('Location: ../edition-profile.php');
        } else {
            header('Location: ../edition-profile.php');
        }
    }
}
