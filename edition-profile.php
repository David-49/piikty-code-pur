<?php include('header.php') ?>

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
        $age = $ligne -> age;
        $tel = $ligne -> numero;
        $pathPhoto = $ligne -> nom_photo_profile;
    }
} else {
    $desc  = "";
    $age = "";
    $tel = "";
    $pathPhoto = "";
}

$reqS -> closeCursor();
?>

<form class="containerForm" action="traitement-edit.php" method="post"  enctype="multipart/form-data">

    <div class="blocPreview">
        <div class="blocPhotoEdition">
            <div class="imageBlockEdition">
                <img src="logo/user-solid.svg" alt="votre image" id="img" class="imageEditionProfil">
            </div>
        </div>

        <div class="input-file-container">
            <label for="photo" tabindex="0" class="input-file-trigger">modifier</label>
            <input type="file" name="photo" accept="image/jpeg" runat="server" id="imgInpt" required class="input-file">
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
            <label for="age">Age</label>
            <input type="number" name="age" value="<?php echo $age; ?>">
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

<?php include('footer.php') ?>
