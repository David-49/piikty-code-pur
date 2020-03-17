<?php include('header.php') ?>
<?php include('traitement-edit.php') ?>

<h1 class="titrePageEdition">Paramètres</h1>

<?php
$login = $_SESSION['loginsession'];
$reqS = $connection -> prepare("SELECT * FROM piikti_users WHERE mail= '$login'");
$reqS -> execute();

while ($ligne = $reqS -> fetch()) {
    $id = $ligne -> id;
    $prenom = $ligne -> prenom;
    $nom = $ligne -> nom;
    $mail = $ligne -> mail;
}

$reqS -> closeCursor();

$reqS = $connection -> prepare("SELECT * FROM piikti_users_meta WHERE id_utilisateur = '$id'");
$reqS -> execute();

if ($reqS -> rowCount() == 1) {
    while ($ligne = $reqS -> fetch()) {
        $desc = $ligne -> description;
        $tel = $ligne -> numero;
        $pathPhoto = $ligne -> chemin_photo_profile;
    }
} else {
    $desc  = "";
    $tel = "";
    $pathPhoto = "";
}

$reqS -> closeCursor();
?>

<div class="wrapEdit">

    <form class="containerForm" method="post"  enctype="multipart/form-data">

        <div class="blocPreview">
            <div class="blocPhotoEdition">
                <div class="imageBlockEdition">
                    <img src="<?php
                        if ($pathPhoto != "" || $pathPhoto != null) {
                            echo $pathPhoto;
                        } else {
                            echo "logo/user-solid.svg";
                        }
                     ?>" alt="votre image" id="img" class="imageEditionProfil">
                </div>
            </div>

            <div class="input-file-container">
                <label for="photo" tabindex="0" class="input-file-trigger">modifier</label>
                <input type="file" name="photo" accept="image/jpeg" runat="server" id="imgInpt" class="input-file">
            </div>
        </div>

        <div class="editionInfo">

            <div class="blocNomPrenom">
                <div class="sousBlocEdit">
                    <label for="nom">Nom</label>
                    <input type="text" name="nomEdit" value="<?php echo $nom; ?>">
                </div>

                <div class="sousBlocEdit">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenomEdit" value="<?php echo $prenom; ?>">
                </div>
            </div>

            <div class="sousBlocEdit blocDescriptionEdit">
                <label for="age">Description</label>
                <textarea name="descEdit" rows="8" cols="80"><?php echo $desc; ?></textarea>
            </div>

            <div class="sousBlocEdit">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebookEdit">
            </div>

            <div class="sousBlocEdit">
                <label for="instagram">Instagram</label>
                <input type="text" name="instaEdit">
            </div>

            <div class="sousBlocEdit">
                <label for="pinterest">Pinterest</label>
                <input type="text" name="pintEdit">
            </div>


            <div class="sousBlocEdit">
                <label for="mailEdit">Adresse mail</label>
                <input type="email" name="mailEdit" value="<?php echo $mail; ?>">
            </div>

            <div class="sousBlocEdit">
                <label for="mdp">Mot de passe actuel</label>
                <input type="password" name="mdpEdit">
            </div>

            <div class="sousBlocEdit">
                <label for="mdpNew">Nouveau mot de passe</label>
                <input type="password" name="mdpNew">
            </div>


            <div class="sousBlocEdit">
                <label for="numero">Téléphone</label>
                <input type="tel" name="tel" value="<?php echo $tel; ?>">
            </div>

            <div class="sousBlocEdit">
                <label for="langue">Langue</label>
                <select class="" name="langue">
                    <option value="français">Français</option>
                    <option value="english">English</option>
                </select>
            </div>


            <button type="submit" name="boutonEdit" class="boutonEdit"><?php echo strtoupper('modifier') ?></button>

        </div>

    </form>

    <div class="msgEdit">
        <h2 class="logReponse">Contrendu :</h2>
        <div class="msgPositif"><?php echo $maj; ?></div>
        <div class="msgNegatif"><?php echo $erreurEdit; ?></div>
    </div>

</div>
<!-- fin wrap -->


<?php include('footer.php') ?>
