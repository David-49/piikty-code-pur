<form class="formConnexion" action="index.html" method="post">
    <legend class="legendConnexion"><?php echo strtoupper('inscription') ?></legend>

    <div class="blocInfo">
        <label for="select-prenom">Prénom</label>
        <input type="text" name="prenom">
    </div>

    <div class="blocInfo">
        <label for="select-nom">Nom</label>
        <input type="text" name="nom">
    </div>

    <div class="blocInfo">
        <label for="select-mail">Adresse mail</label>
        <input type="email" name="mail">
    </div>

    <div class="blocInfo">
        <label for="select-mdp">Mot de passe</label>
        <input type="password" name="mdp">
    </div>

    <div class="blocInfo">
        <label for="select-mdpVerif">Confirmation du mot de passe</label>
        <input type="password" name="mdpVerif">
    </div>


    <button type="submit" name="buttonCo" class="boutonConnexion"><?php echo strtoupper('S\'inscrire') ?></button>

</form>
