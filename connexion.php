<form class="formConnexion" action="" method="post">
    <legend class="legendConnexion"><?php echo strtoupper('connexion') ?></legend>

    <div class="blocInfo">
        <label for="select-mail">Adresse mail</label>
        <input type="email" name="mail">
    </div>

    <div class="blocInfo">
        <label for="select-mdp">Mot de passe</label>
        <input type="password" name="mdp">
    </div>

    <p><span class="mdpOublie">Mot de passe oublié ?</span><a class="lienReset">Cliquez-ici</a></p>
    <button type="submit" name="buttonCo" class="boutonConnexion"><?php echo strtoupper('Se connecter') ?></button>
</form>
