<?php session_start(); ?>
<?php include('BDD/PDO/connection_bdd.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>

        <form class="formConnexion" action="connexion.php"  method="post">
            <legend class="legendConnexion"><?php echo strtoupper('connexion') ?></legend>

            <div class="blocInfo">
                <label for="select-mail">Adresse mail</label>
                <input type="email" name="mailConnect"  id="mail">
            </div>

            <div class="blocInfo">
                <label for="select-mdp">Mot de passe</label>
                <input type="password" name="mdpConnect" id="mdp">
            </div>

            <p><span class="mdpOublie">Mot de passe oublié ?</span><a class="lienReset">Cliquez-ici</a></p>


            <button type="submit" name="buttonCo" class="boutonConnexion" id="boutonConnexion"><?php echo strtoupper('Se connecter') ?></button>
        </form>

        <form class="formConnexion" action="inscription.php" method="post">
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
                <input type="email" name="mailInscription">
            </div>

            <div class="blocInfo">
                <label for="select-mdp">Mot de passe</label>
                <input type="password" name="mdpInscription">
            </div>

            <div class="blocInfo">
                <label for="select-mdpVerif">Confirmation du mot de passe</label>
                <input type="password" name="mdpVerif">
            </div>


            <button type="submit" name="buttonCo" class="boutonConnexion"><?php echo strtoupper('S\'inscrire') ?></button>

        </form>

        <?php
                if (isset($_SESSION['loginsession'])) {
                    var_dump($_SESSION['loginsession']); ?>
                    <a href="deconnexion.php" class="boutonDeco"><?php echo strtoupper('deconnexion') ?></a>

                <?php
                }
                ?>

                <form action="#">
              <div class="input-file-container">
                <input class="input-file" id="my-file" type="file">
                <label tabindex="0" for="my-file" class="input-file-trigger">Modifier</label>
              </div>
              <img src="" id="img" alt="">
    </form>
    </body>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script type="text/javascript">

$(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#my-file").change(function(){
        readURL(this);
    });

    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file" ),
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");

    button.addEventListener( "click", function( event ) {
       fileInput.focus();
       return false;
    });
    // fileInput.addEventListener( "change", function( event ) {
    //     the_return.innerHTML = this.value;
    // });


 });

</script>
</html>
