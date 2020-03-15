<?php include('header.php') ?>


<div class="cadreImage">
    <img src="img/banniere_accueil.jpg" class="image-banniere">
    <div class="calque"></div>

    <div class="blocDesc">
        <h1  class="titrePageHome">Créez, publiez, ayez de la visibilité.</h1>
        <p class="descSite">Grâce à <span>PIIKTI</span>, offrez vous gratuitement
            de la visibilité sur vos créations</p>
        <a href="#" class="lienDesc">A propos de nous</a>
    </div>

</div>

<?php

$reqS2 = $connection -> prepare("SELECT mail, mdp FROM piikti_users");
$reqS2 -> execute();

while ($ligne = $reqS2 -> fetch()) {
    echo "<p>".$ligne -> mail."</p>";
    echo "<p>".$ligne -> mdp."</p>";
}

echo "<br>".password_hash('test', PASSWORD_BCRYPT);

 ?>

<div class="blocImageAccueil">



    <div class="blocImagecadre"><img src="img/tendances.jpg" alt=""><div class="calqueNoir"></div>
    <a href="page-tendances.php" class="titreImage">tendances</a>
    </div>

    <div class="blocImagecadre"><img src="img/produit.jpg" alt=""><div class="calqueNoir"></div>
    <a href="page-categorie.php" class="titreImage">Produits</a>
    </div>

    <div class="blocImagecadre"><img src="img/createurs.jpeg" alt=""><div class="calqueNoir"></div>
    <a href="page-createurs.php" class="titreImage">Les createurs</a>
    </div>

</div>




<?php include('footer.php') ?>
