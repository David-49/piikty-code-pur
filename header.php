<?php include('BDD/PDO/connection_bdd.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/tli5ydr.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Accueil</title>
  </head>

  <body>

      <div class="calqueBlanc" id="calqueBlanc"></div>
      <div class="blocConnexion" id="blocConnexion">
        <?php include('connexion.php'); ?>
      </div>

      <div class="blocConnexion blocInscription" id="blocInscription">
        <?php include('inscription.php'); ?>
      </div>

    <header class="header">

      <a href="index.php" class="lienLogo">
        <img src="logo/logo.svg" alt="Logo" class="logoPiikti">
      </a>

      <div class="info-connexion">
          <img src="logo/user.svg" class="logoUser" id="userClick">
          <div class="popupUser" id="myPopup">

            <div class="blocUserConnect">
                <?php
                if (!empty($_SESSION['loginsession'])) {
                    ?>
                    <form class="formDeco" method="post">
                        <button type="submit" name="buttonDeco"><?php echo strtoupper('Déconnexion'); ?></button>
                    </form>
                    <?php
                    if (!empty($_POST('buttonDeco'))) {
                        session_destroy();
                        header('Location: index.php');
                    }
                } else {
                    ?>
                <div id="connexion" class="boutonUserConnect">Se connecter</div>

                    <?php
                }
                ?>
                <div id="inscription" class="boutonUserConnect">S'inscrire</div>
            </div>

        </div>
          <img src="logo/supermarket.svg" class="logoCaddie">
      </div>




        <nav class="nav">
            <ul class="site__header__menu">
                <li><a href=""><?php echo strtoupper('Tendances') ?></a></li>
                <li><a href=""><?php echo strtoupper('produits') ?></a></li>
                <li><a href=""><?php echo strtoupper('les créateurs') ?></a></li>
            </ul>
        </nav>


    </header>
