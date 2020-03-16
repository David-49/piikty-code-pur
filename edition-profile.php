<?php include('header.php') ?>

<h1 class="titrePageEdition">Paramètres</h1>

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
                <input type="text" name="nomEdit">
            </div>

            <div class="sousBlocEdit">
                <label for="prenom">Prenom</label>
                <input type="text" name="nomEdit">
            </div>
        </div>

        <div class="sousBlocEdit blocDescriptionEdit">
            <label for="age">Description</label>
            <textarea name="descEdit" rows="8" cols="80"></textarea>
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
            <input type="email" name="mailEdit">
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
            <input type="tel" name="tel">
        </div>


        <div class="sousBlocEdit">
            <label for="age">Age</label>
            <input type="number" name="age">
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
