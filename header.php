<?php include('BDD/PDO/connection_bdd.php'); ?>
<?php
 //initialisation variable message log
 if (isset($_SESSION['erreurCo'])) {
     $erreurCo = $_SESSION['erreurCo'];
 } else {
     $erreurCo = "";
 }

 if (isset($_SESSION['erreurIns'])) {
     $erreurIns = $_SESSION['erreurIns'];
 } else {
     $erreurIns = "";
 }

 if (isset($_SESSION['idsession'])) {
     $id = $_SESSION['idsession'];

     $reqS = $connection -> prepare("SELECT prenom, nom, chemin_photo_profile FROM piikti_users p INNER JOIN piikti_users_meta pM ON pM.id_utilisateur = p.id WHERE p.id = '$id'");
     $reqS -> execute();
     while ($ligne = $reqS -> fetch()) {
         $prenom = $ligne -> prenom;
         $nom = $ligne -> nom;
         $pathPhoto = $ligne -> chemin_photo_profile;
     }
 } else {
     $prenom = "";
     $nom = "";
 }

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/tli5ydr.css">
     <script src="https://kit.fontawesome.com/b51ebbfc71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
  </head>

  <body>

      <div class="calqueBlanc" id="calqueBlanc"></div>
      <div class="blocConnexion" id="blocConnexion">

          <div class="croix" id="closeConnect">
              <span></span>
          </div>
          <form class="formConnexion" action="traitement/connexion.php" method="post">
              <legend class="legendConnexion"><?php echo strtoupper('connexion') ?></legend>

              <div class="blocInfo">
                  <label for="select-mail">Adresse mail</label>
                  <input type="email" name="mailConnect"  id="mail" required>
              </div>

              <div class="blocInfo">
                  <label for="select-mdp">Mot de passe</label>
                  <input type="password" name="mdpConnect" id="mdp" required>
              </div>

              <p><span class="mdpOublie">Mot de passe oublié ?</span><a class="lienReset">Cliquez-ici</a></p>

              <?php echo $erreurCo; ?>

              <button type="submit" name="buttonCo" class="boutonConnexion" id="boutonConnexion"><?php echo strtoupper('Se connecter') ?></button>
          </form>
      </div>

      <div class="blocConnexion blocInscription" id="blocInscription">

          <div class="croix" id="closeInscription">
              <span></span>
          </div>


          <form class="formConnexion" action="traitement/inscription.php" method="post">
              <legend class="legendConnexion"><?php echo strtoupper('inscription') ?></legend>

              <div class="blocInfo">
                  <label for="select-prenom">Prénom</label>
                  <input type="text" name="prenom" required>
              </div>

              <div class="blocInfo">
                  <label for="select-nom">Nom</label>
                  <input type="text" name="nom" required>
              </div>

              <div class="blocInfo">
                  <label for="select-date">Date de naissance</label>
                  <input type="date" name="dateNaissance" required>
              </div>


              <div class="blocInfo">
                  <label for="select-mail">Adresse mail</label>
                  <input type="email" name="mailInscription" required>
              </div>

              <div class="blocInfo">
                  <label for="select-mdp">Mot de passe</label>
                  <input type="password" name="mdpInscription" required>
              </div>

              <div class="blocInfo">
                  <label for="select-mdpVerif">Confirmation du mot de passe</label>
                  <input type="password" name="mdpVerif" required>
              </div>

                <?php echo $erreurIns; ?>

              <button type="submit" name="buttonCo" class="boutonConnexion"><?php echo strtoupper('S\'inscrire') ?></button>

          </form>
      </div>

    <header class="header">

      <a href="index.php" class="lienLogo">
        <img src="logo/logo.svg" alt="Logo" class="logoPiikti">
      </a>

      <div class="info-connexion">
          <?php
            if (isset($_SESSION['idsession'])) {
                ?>
              <img src="<?php echo $pathPhoto; ?>" class="logoUserProfile" id="userClick">
                <?php
            } else {
                ?>
                <img src="logo/user.svg" class="logoUser" id="userClick">
                <?php
            }
          ?>
          <div class="popupUser" id="myPopup">
            <?php echo "<p class='accueilUser'>".$prenom." <span class='nomUppercase'>".$nom."</span></p>"; ?>
            <div class="blocUserConnect">
                <?php
                if (isset($_SESSION['loginsession'])) {
                    ?>
                    <a href="page-profil.php" class="lienProfil"><?php echo strtoupper('mon profil'); ?></a>
                    <a href="traitement/deconnexion.php" class="boutonDeco"><?php echo strtoupper('deconnexion') ?></a>

                <?php
                } else {
                    ?>
                    <div id='connexion' class='boutonUserConnect'>Se connecter</div>
                    <div id="inscription" class="boutonUserConnect">S'inscrire</div>

                <?php
                }
                ?>

            </div>

        </div>
          <img src="logo/supermarket.svg" class="logoCaddie">
      </div>

        <nav class="nav">
            <ul class="site__header__menu">
                <li><a href="page-tendances.php"><?php echo strtoupper('Tendances') ?></a></li>
                <li><a href="page-categories.php"><?php echo strtoupper('produits') ?></a></li>
                <li><a href="page-createurs.php"><?php echo strtoupper('les createurs') ?></a></li>
            </ul>
        </nav>


    </header>
