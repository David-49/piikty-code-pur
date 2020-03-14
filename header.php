<?php include('BDD/PDO/connection_bdd.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/tli5ydr.css">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

      <div class="calqueBlanc" id="calqueBlanc"></div>
      <div class="blocConnexion" id="blocConnexion">
        <?php get_template_part('templates/connexion') ?>
      </div>

      <div class="blocConnexion blocInscription" id="blocInscription">
        <?php get_template_part('templates/inscription') ?>
      </div>

    <header class="header">

      <a href="<?php echo home_url('/'); ?>" class="lienLogo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logoPiikti">
      </a>

      <div class="info-connexion">
          <img src="<?php echo get_template_directory_uri(); ?>/img/accueil/user.svg" class="logoUser" id="userClick">
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
                        header('Location:'.home_url('/'));
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
          <img src="<?php echo get_template_directory_uri(); ?>/img/accueil/supermarket.svg" class="logoCaddie">
      </div>




        <nav class="nav">
            <?php wp_nav_menu(
                    array(
                    'theme_location' => 'main',
                    'container' => 'ul',
                    'menu_class' => 'site__header__menu',
                )
                );
            ?>
        </nav>


    </header>

    <?php wp_body_open(); ?>
