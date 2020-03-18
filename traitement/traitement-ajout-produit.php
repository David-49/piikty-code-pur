<?php

$enregistrer = "";
$erreurProduit = "";

if (isset($_SESSION['loginsession'])) {
    $login = $_SESSION['loginsession'];


    $reqUnique = $connection -> prepare("SELECT * FROM piikti_users WHERE mail= '$login'");
    $reqUnique -> execute();

    while ($ligne = $reqUnique -> fetch()) {
        $id = $ligne -> id;
    }

    // var_dump(
    //     $_POST['buttonProduit'],
    //     $_POST['nomProduit'],
    //     $_POST['descProduit'],
    //     $_POST['prixProduit'],
    //     $_POST['catProduit'],
    //     $_FILES['photoProduitInpt']
    // );



    if (isset($_POST['buttonProduit'])
    && !empty($_POST['nomProduit'])
    && !empty($_POST['descProduit'])
    && !empty($_POST['prixProduit'])
    && !empty($_POST['catProduit'])
    && !empty($_FILES['photoProduitInpt'])) {
        $nomProduit = valid_donnees($_POST['nomProduit']);
        $descProduit = valid_donnees($_POST['descProduit']);
        $prixProduit = valid_donnees($_POST['prixProduit']);
        $catProduit = valid_donnees($_POST['catProduit']);

        // var_dump($nomProduit, $descProduit, $prixProduit, $catProduit);

        $nomPhoto = $_FILES["photoProduitInpt"]["name"];
        $type = $_FILES['photoProduitInpt']['type'];
        $taille = $_FILES['photoProduitInpt']['size'];
        $error = $_FILES['photoProduitInpt']['error'];
        $temp_name =  $_FILES["photoProduitInpt"]["tmp_name"];

        //on récupère l'info de l'extension (.jpg si photo)
        $info = strtolower(strrchr($nomPhoto, "."));

        //on stock dans une variable la destination du fichier jusqu'au dossier serveur
        $destination = "upload/photo_produits/$nomPhoto";

        if (strlen($nomProduit) < 256) {
            $reqS = $connection -> prepare("SELECT nom_produit FROM piikti_produit WHERE nom_produit = '$nomProduit'");
            $reqS -> execute();
            if ($reqS -> rowCount() == 0) {
                if (strlen($descProduit) < 1001) {
                    if (preg_match("^[0-9]+(.[0-9]+)?$^", $prixProduit)) {
                        if (strlen($catProduit)) {
                            if ($info == ".jpg" || $info == ".jpeg" && $taille <= 2000000) {
                                $tailleS = null;
                                $tailleM = null;
                                $tailleL = null;
                                if (!empty($_POST['tailleS'])) {
                                    $tailleS = valid_donnees($_POST['tailleS']);
                                }
                                if (!empty($_POST['tailleM'])) {
                                    $tailleM = valid_donnees($_POST['tailleM']);
                                }
                                if (!empty($_POST['tailleL'])) {
                                    $tailleL = valid_donnees($_POST['tailleL']);
                                }

                                //on déplace le fichier dans notre serveur
                                move_uploaded_file($temp_name, $destination);

                                $req1 = $connection -> prepare("INSERT INTO piikti_produit (id_utilisateur, nom_produit, desc_produit, prix_produit, cat_produit, tailleS, tailleM, tailleL, chemin_photo_produit) VALUES (:id_utilisateur, :nom_produit, :desc_produit, :prix_produit, :cat_produit, :tailleS, :tailleM, :tailleL, :chemin_photo_produit)");

                                $ok = $req1 -> execute([
                                    'id_utilisateur' => $id,
                                    'nom_produit' => $nomProduit,
                                    'desc_produit' => $descProduit,
                                    'prix_produit' => $prixProduit,
                                    'cat_produit' => $catProduit,
                                    'tailleS' => $tailleS,
                                    'tailleM' => $tailleM,
                                    'tailleL' => $tailleL,
                                    'chemin_photo_produit' => $destination,
                                ]);

                                $req1 -> closeCursor();

                                //on récupère le dernier id
                                $lastId = $connection -> lastInsertId();

                                //on renomme le fichier de sorte que chaque fichier ai un nom unique avec l'id
                                rename("upload/photo_produits/$nomPhoto", "upload/photo_produits/Photo_".$lastId.$info);

                                //on met à jour la variable avec le nouveau nom
                                $destination = "upload/photo_produits/Photo_".$lastId.$info;

                                //on met à jour le nom du fichier dans la base de donnée
                                $reqUp2 = $connection -> prepare("UPDATE piikti_produit SET chemin_photo_produit = '$destination' WHERE id = $lastId");
                                $reqUp2 -> execute();

                                $reqUp2 -> closeCursor();



                                if ($ok) {
                                    $enregistrer = "<p>Votre produit est bien enregistré</p>";
                                }
                            } else {
                                $erreurProduit = "<p class='erreurEdit'>La photo n'est pas au format jgp ou fait plus de 2Mo.</p>";
                            }
                        } else {
                            $erreurProduit = "<p class='erreurEdit'>La catégorie dépasse la limite des 255 caractères.</p>";
                        }
                    } else {
                        $erreurProduit = "<p class='erreurEdit'>La valeur que vous avez rentré ne correspond pas à un format prix.</p>";
                    }
                } else {
                    $erreurProduit = "<p class='erreurEdit'>La description dépasse la limite des 1000 caractères</p>";
                }
            } else {
                $erreurProduit = "<p class='erreurEdit'>Il y'a déjà un produit avec ce nom là.</p>";
            }
        } else {
            $erreurProduit = "<p class='erreurEdit'>Le nom dépasse la limite des 255 caractères.</p>";
        }
    }
}

//modifier structure
//utilisation de cookies ?
